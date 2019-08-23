<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name')?></title>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>

<div class="blog-masthead">
    <header>
    <div id='nav-container'>
        <div id='nav-header'>
            <?php if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo '<h1 id="logo">'. get_bloginfo( 'name' ) .'</h1>';
            }
            ?>
            <img id='menu-toggle' src='<?php bloginfo('template_url'); ?>/images/menu-icon.png'>
        </div>
        <nav class="blog-nav">
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </nav>
    </div>
    </header>
</div>


<div class="row">