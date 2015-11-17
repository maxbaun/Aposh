<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
    <head>
      <meta charset="<?php bloginfo( 'charset' ) ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title><?php wp_title( '|', true, 'right' ) ?></title>
  		<meta name="author" content="">
  		<link rel="author" href="">
  		<?php wp_head() ?>
    </head>
    <body <?php body_class() ?> data-carousel-interval="<?php echo get_option('aposh_carousel_interval'); ?>">
		<header id="page-header">
      <nav id="social-nav" class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <?php echo do_shortcode('[social-icons follow="follow us: "][/social-icons]'); ?>
          <div class="client">
            <a href="<?php echo get_permalink(get_option('aposh_client_login_page')); ?>">Client Login <span class="glyphicon glyphicon-play"></span></a>
          </div>
        </div><!-- /.container-fluid -->
      </nav>    
      <nav class="navbar navbar-aposh">
        <div class="container">
            
            <div class="navbar-header">
              <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img width="281" height="80" src="<?php themeImage('aposh_logo.png'); ?>" alt="A Posh Production Logo"/>
              </a>
              <div class="tagline"><?php echo get_option('aposh_tagline'); ?></div>
              <div class="call">
                <div class="text" style="display:inline-block;vertical-align:middle;">
                  <p class="action"><?php echo get_option('aposh_call_text'); ?></p>
                  <?php echo do_shortcode('[phone-link class="phone"][/phone-link]'); ?>
                </div>
                <?php 
                  $call_icon = get_option('aposh_call_icon');
                  
                  if(isset($call_icon) && $call_icon != ''){
                    echo do_shortcode('[phone-link class="phone"]<span class="call-icon"></span>[/phone-link]');
                  } 
                ?>
              </div>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>            
            </div>          
            
            <?php
              wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'main-nav',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'collapse navbar-collapse',
                  'container_id'      => 'primary-nav',
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
            ?>  
        </div>
      </nav>    
		</header>
		<div id="content-wrap">
