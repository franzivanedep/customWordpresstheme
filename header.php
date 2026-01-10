<?php
/**
 * Custom Phoenix header for Twenty Twenty theme.
 * Fully connected to the WordPress Customizer.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="header-footer-group">

    <style>
        :root {
            --primary-color: <?php echo esc_attr(get_theme_mod('phoenix_primary_color', '#00b37e')); ?>;
            --header-bg-color: <?php echo esc_attr(get_theme_mod('phoenix_header_bg', '#fff')); ?>;
            --header-text-color: <?php echo esc_attr(get_theme_mod('phoenix_header_text', '#333')); ?>;
            --font-family-poppins: 'Poppins', sans-serif;
        }

        /* Set Poppins for the whole header */
        #site-header {
            font-family: var(--font-family-poppins);
        }

        .phoenix-header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background: var(--header-bg-color);
            width: 100%;
            box-sizing: border-box;
            border-bottom: 1px solid #f0f0f0;
            position: relative;
        }

        .site-title a {
            color: var(--header-text-color);
            text-decoration: none;
            font-weight: 800; /* Extra Bold for the logo look */
            font-size: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .site-title span { color: var(--primary-color); }

        .phoenix-nav ul { list-style: none; display: flex; gap: 30px; margin: 0; padding: 0; }
        .phoenix-nav a { 
            color: var(--header-text-color); 
            text-decoration: none; 
            font-weight: 600; 
            font-size: 15px;
        }

        .header-actions { display: flex; align-items: center; gap: 20px; }
        .cta-button {
            background: var(--primary-color);
            color: #fff !important;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
        }

        .login-link { 
            color: var(--primary-color) !important; 
            font-weight: 600; 
            text-decoration: none; 
            font-size: 15px;
        }

        /* Mobile Toggle */
        .mobile-toggle { display: none; background: #f5f6f7; border: 1px solid #eee; padding: 10px; border-radius: 6px; cursor: pointer; width: 54px; height: 50px; }
        .mobile-toggle span { display: block; width: 28px; height: 3px; background: #333; margin: 5px auto; border-radius: 2px; }

        @media (max-width: 991px) {
            .mobile-toggle { display: block; }
            .phoenix-header-inner { flex-wrap: wrap; }
            .phoenix-nav, .header-actions { display: none; width: 100%; }
            .menu-active .phoenix-nav, .menu-active .header-actions { display: block; }
            .phoenix-nav ul { flex-direction: column; margin-top: 20px; border-top: 1px solid #eee; }
            .phoenix-nav a { display: block; padding: 20px 15px; font-size: 18px; border-bottom: 1px solid #f0f0f0; }
            .cta-button { display: block; margin: 20px 15px; text-align: center; }
            .login-link { display: block; margin: 20px 15px; text-align: center; }
        }
    </style>

    <div class="phoenix-header-inner" id="phoenixHeader">
        <div class="site-branding">
            <h1 class="site-title" style="margin:0;">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <span>●</span> <?php echo esc_html(get_theme_mod('phoenix_site_title', 'Phoenix')); ?>
                </a>
            </h1>
        </div>

        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <span></span><span></span><span></span>
        </button>

        <nav class="phoenix-nav">
            <?php 
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb'    => false,
                'container'      => '',
                'items_wrap'     => '<ul>%3$s</ul>',
            ) ); 
            ?>
        </nav>

        <div class="header-actions">
            <a href="<?php echo esc_url(get_theme_mod('phoenix_login_url', '/login')); ?>" class="login-link">
                <?php echo esc_html(get_theme_mod('phoenix_login_text', 'Inloggen')); ?>
            </a>
            <a href="<?php echo esc_url(get_theme_mod('phoenix_cta_url', '/register')); ?>" class="cta-button">
                <?php echo esc_html(get_theme_mod('phoenix_cta_text', 'Probeer gratis')); ?>
            </a>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            document.getElementById('phoenixHeader').classList.toggle('menu-active');
        }
    </script>

</header>