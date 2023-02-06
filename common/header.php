<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo social_tags(@$bodyclass); ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title>
        <?php echo implode(' &middot; ', $titleParts); ?>
    </title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Icon -->
    <link rel="icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon">

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic');
    queue_css_file(array('iconfonts', 'normalize', 'style', 'owl.carousel', 'owl.theme', 'font-awesome/css/font-awesome.min'), 'screen');
    queue_css_file('print', 'print');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(
        array(
            'vendor/selectivizr',
            'vendor/jquery-accessibleMegaMenu',
            'vendor/respond',
            'jquery-extra-selectors',
            'AOD',
            'globals',
            'owl.carousel.min'
        )
    );
    ?>

    <?php echo head_js(); ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1DZXNGW2KT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-1DZXNGW2KT');
    </script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<a href="#content" id="skipnav">
    <?php echo __('Skip to main content'); ?>
</a>
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
<div id="wrap">
    <header role="banner">
        <div id="site-title">
            <?php echo link_to_home_page('<img src="' . img('aod_brand.png') . '" alt="FIT Archive On Demand">'); ?>
        </div>
        <div id="menu-button">
            <a href="#" class="menu"><i class="fa fa-bars  fa-2x"></i></a>
        </div>
        <div id="search-container" class="desktop" role="search">
            <form id="search-form" name="search-form" action="<?php echo url('/items/browse'); ?>" method="get">
                <input type="text" name="search" id="keyword-search" value="" size="40" title="Search">
                <button name="submit_search" id="submit_search" type="submit" value="Search">Search</button>
            </form>
        </div>
        <nav id="top-nav" class="top" role="navigation">
            <?php echo public_nav_main(); ?>
        </nav>

        <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
    </header>
    <div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
        <?php echo public_nav_main(); ?>
        <div id="search-container" class="mobile" role="search">
            <form id="search-form" name="search-form" action="<?php echo url('/items/browse'); ?>" method="get">
                <input type="text" name="search" id="keyword-search" value="" size="40" title="Search">
                <button name="submit_search" id="submit_search" type="submit" value="Search">Search</button>
            </form>
        </div>
    </div>
    <div id="content" role="main" tabindex="-1">
        <?php
        if (!is_current_url(WEB_ROOT)) {
            fire_plugin_hook('public_content_top', array('view' => $this));
        }
        ?>