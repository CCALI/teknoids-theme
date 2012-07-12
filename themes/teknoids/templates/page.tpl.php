<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
  <?php print $styles; ?>   
  
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" />
  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>

<body class="<?php print $body_classes; ?>">

<!-- begin GLOBAL -->
<!-- div id="global" -->
  <nav class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
         <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
         <?php if ($site_name): ?>
          <a class="brand" href="<?php print check_url($front_page); ?>"><?php print check_plain($site_name); ?></a>
         <?php endif; ?>
         <div class="nav-collapse">
          <?php print theme('links', $primary_links, array('class' => 'nav')); ?>
         </div> 
      </div>
    </div>
  </nav>
  
  <div class="container-fluid">
      <div class="row-fluid">
        
        <div class="span9">
          <?php if ($is_front == TRUE): ?>
          <div class="hero-unit hidden-tablet hidden-phone">
            <?php if ($logo): ?>
            <a href="<?php print check_url($front_page); ?>" class="logo"><img src="<?php print check_url($logo); ?>" alt="<?php print $site_name; ?>" /></a>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
              <h3 class="site-slogan"><?php print check_plain($site_slogan); ?></h3>
            <?php endif; ?>  
            <?php print $header; ?>
          </div>
          <?php endif; ?>
          <div class="row-fluid">
            <div class="span12">
              <?php if (!empty($breadcrumb)): print $breadcrumb; endif; ?>
              <?php print $messages; ?>
              <?php if ($tabs): ?>
                <div class="tabs"><?php print $tabs; ?></div>
              <?php endif; ?>
              <?php print $help; ?>
              <?php print $content_top; ?>
              <?php print $content; ?>
              <?php print $content_bottom; ?>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
        <div class="span3">
          <div class="well sidebar-nav">
            <?php print $sidebar_first; ?>
          </div><!--/.well -->
        </div><!--/span-->
      </div><!--/row-->

      <hr>
    <?php if ($footer || $footer_message) : ?>
      <!-- begin FOOTER -->
      <footer id="site-footer" role="contentinfo" class="clearfix">
        <?php print $footer; ?>
        <?php if (!empty($footer_message)): print $footer_message; endif; ?>
        <?php print $feed_icons; ?>
      </footer>
      <!-- end FOOTER -->
      <?php endif; ?>

    </div><!--/.container-->

    
        
  </div>
	

<?php print $scripts; ?>  
<?php print $closure; ?>

</body>
  
</html>