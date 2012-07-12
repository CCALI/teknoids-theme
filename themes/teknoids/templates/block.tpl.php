<<?php print $tag; ?> id="block-<?php print $block->module .'-'. $block->delta ?>" class="<?php print $block_classes . ' ' . $block_zebra; ?>">

  <?php if ($block->subject): ?>
    <h3 class="title"><?php print $block->subject; ?></h3>
  <?php endif;?>

  <div class="content">
    <?php print $block->content; ?>
  </div>
  
  <?php print $edit_block; ?>
  
</<?php print $tag; ?>>