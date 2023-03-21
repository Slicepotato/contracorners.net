<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Contra_Corners
 * @since Contra Corners 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <title><?php get_the_title(); ?></title>

        <link href="//www.google-analytics.com" rel="dns-prefetch">
        
        <?php // get_template_part( 'partials/header', 'favicon' ); ?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
        <div class="page-wrapper">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <div class="main-container">
            <div class="content-wrap">
                <header class="header" role="banner">
                    <div class="upper">
                        <?php get_template_part('partials/logo', 'component'); ?>
                        <?php get_template_part('partials/nav', 'component'); ?>
                    </div>
                </header>
