<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name')?></title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca|Raleway|Roboto:400,700&display=swap" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>

<div class="blog-masthead">
    <header>
    <div class='container'>
    <?php if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<h1 id="logo">'. get_bloginfo( 'name' ) .'</h1>';
    }
    ?>

        <nav class="blog-nav">
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        </nav>
    </div>
    </header>
</div>


<div class="row">