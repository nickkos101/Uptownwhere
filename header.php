<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/function.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,800,300' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
</head>
<header>
    <div class="container">
        <a href="<?php echo get_site_url(); ?>"><h1 class="logo">Uptown Where</h1></a>
        <nav>
         <?php wp_nav_menu(array('theme_location' => 'Header_Nav',)); ?>
     </nav>
     <div class="social-media">
        <a href="https://facebook.com/uptownwhere" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="http://twitter.com/uptownwhere" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="http://pinterest.com/uptownwhere" target="_blank"><i class="fa fa-pinterest"></i></a>
        <a href="https://instagram.com/uptownwhere" target="_blank"><i class="fa fa-instagram"></i></a>
    </div>
    <div class="signup">
        <p>Follow:</p>
        <form accept-charset="utf-8" action="http://uptownwhere.com/subscribe/" method="post" _lpchecked="1">
            <input name="email" type="text" placeholder="your email...">
            <input name="subscribe" type="submit" value="Sign Up!">
        </form>
    </div>
</div>
</header>