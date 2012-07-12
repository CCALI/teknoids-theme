<?php
/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*  array An array of saved settings for this theme.
* @return
*  array A form array.
*/

function teknoids_settings($saved_settings) {

  // Get the default values from the .info file.
  $defaults = teknoids_theme_get_default_settings('teknoids');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);
  
  // Create the form widgets using Forms API
  $form['teknoids_wireframes'] = array(
    '#type' => 'checkbox',
    '#title' => t('Activate Wireframes'),
    '#default_value' => $settings['teknoids_wireframes'],
    '#description'   => t('<strong>Wireframes</strong> are very useful when you are specifying the global dimensions and floats of your regions.', array('!link' => 'http://www.boxesandarrows.com/view/html_wireframes_and_prototypes_all_gain_and_no_pain')),
  );
  $form['teknoids_block_editing'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show block editing on hover'),
    '#default_value' => $settings['teknoids_block_editing'],
    '#description'   => t('When hovering over a block, privileged users will see <strong>block editing links</strong>.'),
  );
  $form['teknoids_css_prototyping'] = array(
    '#type' => 'checkbox',
    '#title' => t('Activate Prototyping tool'),
    '#default_value' => $settings['teknoids_css_prototyping'],
    '#description'   => t('Edit your content directly in the browser. <strong>Works only in WebKit-based browsers like Chrome or Safari</strong>. <a href="http://www.css-101.org/articles/trick-for-rapid-prototyping/demo.html">Check the demo</a>.'),
  );
  $form['teknoids_grid_system'] = array(
    '#type' => 'checkbox',
    '#title' => t('Activate Grid System'),
    '#default_value' => $settings['teknoids_grid_system'],
    '#description'   => t('To change the theme default grid system, generate your .png file in <a href="http://gridulator.com/">http://gridulator.com/</a>.<br />Then, put your file in the <strong>/images</strong> folder and modify the <strong>line 86</strong> in the <strong>theme-settings.css</strong> file.'),
  );

  // Return the additional form widgets
  return $form; 

}

function teknoids_theme_get_default_settings($theme) {

  $themes = list_themes();

  // Get the default values from the .info file.
  $defaults = !empty($themes[$theme]->info['settings']) ? $themes[$theme]->info['settings'] : array();

  if (!empty($defaults)) {
    // Get the theme settings saved in the database.
    $settings = theme_get_settings($theme);
    // Don't save the toggle_node_info_ variables.
    if (module_exists('node')) {
      foreach (node_get_types() as $type => $name) {
        unset($settings['toggle_node_info_' . $type]);
      }
    }
    // Save default theme settings.
    variable_set(
      str_replace('/', '_', 'theme_' . $theme . '_settings'),
      array_merge($defaults, $settings)
    );
    // If the active theme has been loaded, force refresh of Drupal internals.
    if (!empty($GLOBALS['theme_key'])) {
      theme_get_setting('', TRUE);
    }
  }

  // Return the default settings.
  return $defaults;
}