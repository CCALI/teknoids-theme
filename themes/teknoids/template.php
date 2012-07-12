<?php 
/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *  A sequential array of variables to pass to the theme template.
 * @param $hook
 *  The name of the theme function being called ("page" in this case).
 */
function teknoids_preprocess_page(&$vars, $hook) {

  /* BODY classes
  ---------------------------------------------------------------------- */
  $body_classes = array($vars['body_classes']);
  
  // Set up layout variable.
  $vars['layout'] = '';

  if (!empty($vars['sidebar_first'])) {
    $vars['layout'] = 'sidebar-first';
  }
  if (!empty($vars['sidebar_second'])) {
    $vars['layout'] = ($vars['layout'] == 'sidebar-first') ? 'both-sidebars' : 'sidebar-second';
  }
  
  $body_classes[] = $vars['layout'];
  
  // Optionally add the wireframes styles for the "Wireframes" theme setting.
  if (theme_get_setting('teknoids_wireframes')) {
    $body_classes[] = 'wireframes';
  }
  
  // Optionally add the prototype styles for the "Prototyping tool" theme setting.
  if (theme_get_setting('teknoids_css_prototyping')) {
    $body_classes[] = 'prototyping';
  }
  
  // Optionally add the grid-system styles for the "Grid System" theme setting.
  if (theme_get_setting('teknoids_grid_system')) {
    $body_classes[] = 'grid-system';
  }
  // Concatenate with spaces
  $vars['body_classes'] = implode(' ', $body_classes);
  
  /* Custom Page template file per content type
  ---------------------------------------------------------------------- */
  //Example: page-my-content-type.tpl.php
  if ($vars['node']->type != "") {
    $vars['template_files'][] = "page-" . $vars['node']->type;
  }
  
  /* IE conditionnal stylesheets
  ---------------------------------------------------------------------- */
  // Access the .info variables.
  global $theme_info;
  
  // Get the path to the theme to make the code more  efficient and simple.  
  $path = drupal_get_path('theme', $theme_info->info['name']); 
  
  // Check for IE conditional stylesheets.
  if (isset($theme_info->info['ie stylesheets'])) {
    $ie_css = array();

    // Format the array to be compatible with drupal_get_css().
    foreach ($theme_info->info['ie stylesheets'] as $condition => $media) {
      foreach ($media as $type => $styles) {
        foreach ($styles as $style) {
          $ie_css[$condition][$type]['theme'][$path . '/' . $style] = TRUE;
        }
      }
    }
    // Append the stylesheets to $styles, grouping by IE version and applying the proper wrapper.
    foreach ($ie_css as $condition => $styles) {
    //print_r($styles);	
      $vars['styles'] .= '<!--[' . $condition . ']>' . "\n" . drupal_get_css($styles) . '<![endif]-->' . "\n";
    }
  }
  
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *  A sequential array of variables to pass to the theme template.
 * @param $hook
 *  The name of the theme function being called ("node" in this case.)
 */
function teknoids_preprocess_node(&$vars, $hook) {
  
  /* NODE classes
  ---------------------------------------------------------------------- */
    $classes = array('node');
  if ($vars['sticky']) {
    $classes[] = 'sticky';
  }
  // support for Skinr Module
  if (module_exists('skinr') && $vars['skinr'] != '') {
    $classes[] = $vars['skinr'];
  }
  
  if ($vars['teaser']) {
    $classes[] = 'node-teaser';
  }
  
  // Class for node type: "node-type-page", "node-type-story", "node-type-my-custom-type", etc.
  $classes[] = 'node-type-' . $vars['type'];
  
  // Concatenate with spaces
  $vars['node_classes'] = implode(' ', $classes);
  
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *  A sequential array of variables to pass to the theme template.
 * @param $hook
 *  The name of the theme function being called teknoids
 */
function teknoids_preprocess_block(&$vars, $hook) {

  /* BLOCK classes
  ---------------------------------------------------------------------- */
  $block = $vars['block'];
  
  $classes = array('block');
  $classes[] = 'block-' . $vars['block']->module;
  $classes[] = 'clearfix';
    
  // support for Skinr Module
  if (module_exists('skinr') && $vars['skinr'] != '') {
    $classes[] = $vars['skinr'];
  }
  
  // Concatenate with spaces
  $vars['block_classes'] = implode(' ', $classes);
  
  /* BLOCK EDITING theme setting
  ---------------------------------------------------------------------- */
  if (theme_get_setting('teknoids_block_editing') && user_access('administer blocks')) {
    // Display 'edit block' for custom blocks.
    if ($block->module == 'block') {
      $vars['edit_block'] = l(t('edit block'), 'admin/build/block/configure/block/' . $block->delta, array('attributes'=>array('class'=>'block-edit', 'title'=>'edit '.$block->subject.' block'), 'query'=>drupal_get_destination()));
    }
    // Display 'edit menu' for Menu blocks.
    if ($block->module == 'menu' && user_access('administer menu')) {
      $menu_name = ($block->module == 'user') ? 'navigation' : $block->delta;
      $vars['edit_block'] = l(t('edit menu'), 'admin/build/menu-customize/' . $menu_name, array('attributes'=>array('class'=>'block-edit menu', 'title'=>'edit '.$menu_name.' block'), 'query'=>drupal_get_destination()));
    }
    // Display 'edit menu' for Menu block blocks.
    elseif ($block->module == 'menu_block' && user_access('administer menu')) {
      list($menu_name, ) = split(':', variable_get("menu_block_{$block->delta}_parent", 'navigation:0'));
      $vars['edit_block'] = l(t('edit menu'), 'admin/build/menu-customize/' . $menu_name, array('attributes'=>array('class'=>'block-edit', 'title'=>'edit '.$menu_name.' block'), 'query'=>drupal_get_destination()));
    }
  }  
  
  /* HTML5 tags
  ---------------------------------------------------------------------- */
  // Set Tag for the block wrapper depending on the content (<nav> or <section>)
  if ($block->module == 'menu') {
    $vars['tag'] = 'nav';
  } 
  else {
    $vars['tag'] = 'div';
  }
  
}

/**
 * Allow themable breadcrumb.
 */
function teknoids_breadcrumb($breadcrumb) {
	
  if (!empty($breadcrumb)) {
    $crumbs = '<ul class="breadcrumb">';
    $array_size = count($breadcrumb);
    $i = 0;
    while ( $i < $array_size) {
      $crumbs .= '<li>' . $breadcrumb[$i] . ' > </li>';
          $i++;
      }
    $crumbs .= '<li class="current-page">'. drupal_get_title() .'</span></ul>';
    return $crumbs;
  }
}

/**
 * Access views elements.
 * 
 * Use $raw_result in your views templates to print all the fiels and add custom markup.
 */
function teknoids_preprocess_views_view_unformatted(&$vars) {
    $vars['raw_result'] = $vars['view']->style_plugin->rendered_fields;
}


/**
 * Implementation of hook_theme().
 *
 * Lullabot tutorial: http://www.lullabot.com/articles/modifying-forms-drupal-5-and-6.
 */
function teknoids_theme() {
  return array(
    // The form ID.
    'your_form_id' => array(
      // Forms always take the form argument.
      'arguments' => array('form' => NULL),
    ),
  );
}

/**
 * Example of how to alter your previous registered form.
 */
function teknoids_your_form_id($form) {
  
  // unset($form['name']['#title']);
  // $form['submit']['#value'] = 'My value';
  // return (drupal_render($form));
  
}

/**
 * Implemention of theme_menu_item_link().
 *
 * Generate the HTML output for a single menu link.
*/
function teknoids_menu_item_link($link) {

  if (empty($link['localized_options'])) {
    $link['localized_options'] = array();
  }

  return l($link['title'], $link['href'], $link['localized_options']);
  
}