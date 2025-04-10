<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Utility Bar -->
<div class="utility-bar">
    <div class="header__container">
        <div class="utility-links">
            <a href="tel:+12501234567">+1 (250) 123-4567</a>
            <span class="separator">|</span>
            <a href="mailto:info@areatourism.com">info@areatourism.com</a>
            <span class="separator">|</span>
            <a href="#" class="social-link">
                <span class="screen-reader-text">Facebook</span>
                <svg viewBox="0 0 24 24" width="16" height="16">
                    <path fill="currentColor" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="header">
    <div class="header__container">
        <div class="header__content">
            <div class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tourism-office-logo.png'); ?>" 
                         alt="<?php bloginfo('name'); ?>" 
                         class="header__logo-image">
                </a>
            </div>

            <nav class="header__nav">
                <button class="header__menu-toggle" aria-label="Toggle Menu">
                    <span class="header__menu-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'header__menu',
                    'menu_id' => 'primary-menu',
                    'fallback_cb' => false,
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<div id="content" class="site-content">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.header__menu-toggle');
    const menu = document.querySelector('.header__menu');
    
    if (menuToggle && menu) {
        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('header__menu-toggle--active');
            menu.classList.toggle('header__menu--active');
        });
    }
});
</script>
