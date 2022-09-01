<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <?php wp_head();?>

  
</head>

<body>

<header class="footer">
      <div class="container">
      <div class="header__top">
        <a class="logo" href="/">
            <?php $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
            <img class="logo__img" src="<?php echo $custom_logo__url[0];?>" alt="logo">

        </a>
        <a class="phone" href="tel:<?php the_field('phone')?>"><?php the_field('phone')?></a>
        <?php wp_nav_menu(); ?>
      </div>
        </div>
  </header>