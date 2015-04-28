<!DOCTYPE html>
<html>
<head>
  <title><?php wp_title( '' ); ?></title>
  <!-- <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php wp_head(); ?>
<script> if (matchMedia && window.matchMedia('(min-device-width: 30px) and (max-device-width: 850px)').matches) { document.cookie = 'dylan=1; path=/'; } </script>
</head>
<body class="col-wrap">
  <script src="<?php echo get_template_directory_uri(); ?>/js/fb-sdk.js" ></script>
<div id="fb-root"></div>
<?php if ( wp_is_mobile() ) { ?> 
<header class="responsive">
  <div class="header-wrapper">
    <div class="column four-fifths talignleft">
     <div class="social-media">
        <a href="https://facebook.com/uptownwhere" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="http://twitter.com/uptownwhere" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="http://pinterest.com/uptownwhere" target="_blank"><i class="fa fa-pinterest"></i></a>
        <a href="https://instagram.com/uptownwhere" target="_blank"><i class="fa fa-instagram"></i></a>
    </div>
      <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/squiggly.png" />
      </div>
        <a href="<?php echo get_site_url(); ?>"><h1 class="logo"><span class="color">Uptown Where</span></h1></a>
    </div>
    <div class="column fifth talignright">
<nav>
<ul class="no-list">
  <li class="menu-icon"><i class="fa fa-bars"></i></li>
    <ul>
      <li class="three-s-transition action-menu">
      <?php wp_nav_menu(array('theme_location' => 'Header_Nav',)); ?>
      </li>
</ul>
</nav>
</div>
</div>
</header>
<?php } else { ?>
<header class="header">
  <div class="header-wrapper">
    <div class="column half">
     <div class="social-media">
        <a href="https://facebook.com/uptownwhere" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="http://twitter.com/uptownwhere" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="http://pinterest.com/uptownwhere" target="_blank"><i class="fa fa-pinterest"></i></a>
        <a href="https://instagram.com/uptownwhere" target="_blank"><i class="fa fa-instagram"></i></a>
    </div>
      <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/squiggly.png" />
      </div>
        <a href="<?php echo get_site_url(); ?>"><h1 class="logo"><span class="color">Uptown Where</span></h1></a>
  </div>
    <div class="column half talignright">
       <nav>
         <?php wp_nav_menu(array('theme_location' => 'Header_Nav',)); ?>
     </nav>
   </div>
    </div>
</header>
<?php } ?>