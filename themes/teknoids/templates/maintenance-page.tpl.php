<?php
/**
 * Don't forget to configure the SETTINGS.PHP file and ADD $conf['maintenance_theme'] = 'themeName';	
 */
?>

<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?> 
  
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>

<body class="<?php print $body_classes; ?>">

<!-- begin GLOBAL -->
<div id="global">
		
    <!-- begin MIDDLE CONTENT -->
    <div id="middle-content" role="main">    
      <?php print $messages; ?>
      <?php if ($tabs): ?>
        <div class="tabs"><?php print $tabs; ?></div>
      <?php endif; ?>
      <?php print $help; ?>
  	  <?php print $content; ?>
	</div>
    <!-- end MIDDLE CONTENT -->
		    
</div>
<!-- end GLOBAL --> 	

<?php print $closure; ?>

</body>
  
</html>