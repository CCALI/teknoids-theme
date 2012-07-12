<article id="node-<?php print $node->nid; ?>" class="<?php print $node_classes; ?>">

  <header class="node-header">
  <?php if (!$page): ?>
    <h3><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title; ?></a></h3>
  <?php else : ?>
  	<h2><?php print $title ?></h2>
  <?php endif; ?>

  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted; ?></span>
  <?php endif; ?>
  </header>

  <div class="content">
    <?php print $content; ?>
  </div>
  
  <?php if($terms || $links): ?>
  <footer class="node-footer meta clearfix">
    <?php if ($terms): ?>
      <div class="terms"><?php print $terms; ?></div>
    <?php endif;?>

    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </footer>
  <?php endif; ?>
  	
</article>