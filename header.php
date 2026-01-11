<?php
/**
 * Custom Phoenix header for Twenty Twenty theme.
 * Mobile dropdown now includes action buttons.
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

<header id="site-header">

<style>
    :root {
        --primary-color: <?php echo esc_attr(get_theme_mod('phoenix_primary_color', '#00b37e')); ?>;
        --header-bg-color: <?php echo esc_attr(get_theme_mod('phoenix_header_bg', '#fff')); ?>;
        --header-text-color: #1a1a1a;
        --font-family-poppins: 'Poppins', sans-serif;
        --container-max-width: 1250px; 
    }

    #site-header {
        font-family: var(--font-family-poppins);
        background: var(--header-bg-color);
        border-bottom: 1px solid #f0f0f0;
        width: 100%;
        position: relative;
        z-index: 9999;
    }

    .phoenix-header-inner {
        max-width: var(--container-max-width);
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        box-sizing: border-box;
        height: 80px;
    }

    /* --- LOGO --- */
    .site-branding { display: flex; align-items: center; }
    .site-logo-link { display: block; }
    .site-logo-img { max-height: 50px; width: auto; display: block; }

    /* --- NAV & MIDDLE --- */
    .phoenix-nav {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .phoenix-nav ul { 
        list-style: none; 
        display: flex; 
        gap: 30px; 
        margin: 0; 
        padding: 0;
        align-items: center;
    }
    .phoenix-nav a { 
        color: var(--header-text-color); 
        text-decoration: none; 
        font-weight: 400; /* Regular weight */
        font-size: 15px;
        white-space: nowrap; 
        line-height: 1;
        transition: color 0.2s ease;
    }
    .phoenix-nav a:hover { color: var(--primary-color); }

    /* --- ACTIONS (Desktop) --- */
    .header-actions { display: flex; align-items: center; gap: 15px; }

    .login-link { 
        /* Changed from #1a1a1a to var(--primary-color) */
        color: var(--primary-color) !important; 
        font-weight: 400; /* Changed from 600 to Regular */
        text-decoration: none; 
        font-size: 15px;
        padding: 10px 18px;
        border-radius: 8px;
        line-height: 1;
        transition: background 0.2s ease, opacity 0.2s ease;
    }
    .login-link:hover { 
        background-color: #f2f2f2; 
        opacity: 0.8;
    }

    .cta-button {
        background: var(--primary-color);
        color: #fff !important;
        padding: 14px 24px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 400; /* Changed from 700 to Regular */
        font-size: 15px;
        white-space: nowrap;
        line-height: 1;
        display: inline-flex;
        align-items: center;
        transition: transform 0.08s ease-out;
    }
    .cta-button:hover { transform: translateY(-3px); }

    /* --- MOBILE SPECIFICS --- */
    .mobile-toggle { 
        display: none; 
        background: #f5f6f7; 
        border: 1px solid #eee; 
        padding: 10px; 
        border-radius: 6px; 
        cursor: pointer; 
        flex-direction: column;
        gap: 4px;
    }
    .mobile-toggle span { display: block; width: 20px; height: 2px; background: #333; }

    .mobile-actions-wrapper { display: none; }

    @media (max-width: 1100px) {
        .mobile-toggle { display: flex; }
        .header-actions .login-link, 
        .header-actions .cta-button { display: none; }

        .phoenix-nav {
            display: none; 
            position: absolute;
            top: 80px;
            left: 0;
            width: 100%;
            background: #fff;
            flex-direction: column;
            padding: 10px 0 30px 0;
            border-top: 1px solid #f0f0f0;
            box-shadow: 0 10px 15px rgba(0,0,0,0.05);
        }

        .menu-active .phoenix-nav { display: flex; }

        .phoenix-nav ul { 
            flex-direction: column; 
            width: 100%; 
            gap: 0; 
        }

        .phoenix-nav a { 
            padding: 18px; 
            width: 100%; 
            text-align: center; 
            border-bottom: 1px solid #fafafa; 
        }

        .mobile-actions-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px;
            width: 100%;
        }
        .mobile-actions-wrapper .login-link,
        .mobile-actions-wrapper .cta-button {
            display: flex;
            width: 90%;
            justify-content: center;
        }
    }
</style>

    <div class="phoenix-header-inner" id="phoenixHeader">
        <div class="site-branding">
            <?php if ( get_theme_mod( 'phoenix_logo' ) ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link" rel="home">
                    <img src="<?php echo esc_url( get_theme_mod( 'phoenix_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="site-logo-img">
                </a>
            <?php endif; ?>
        </div>

        <nav class="phoenix-nav">
            <?php 
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb'    => false,
                'container'      => '',
                'items_wrap'     => '<ul>%3$s</ul>',
            ) ); 
            ?>
            
            <div class="mobile-actions-wrapper">
                <a href="/login" class="login-link"><?php echo esc_html(get_theme_mod('phoenix_login_text', 'Inloggen')); ?></a>
                <a href="/offerte" class="cta-button"><?php echo esc_html(get_theme_mod('phoenix_cta_text', 'Probeer gratis')); ?></a>
            </div>
        </nav>

        <div class="header-actions">
            <a href="/login" class="login-link"><?php echo esc_html(get_theme_mod('phoenix_login_text', 'Inloggen')); ?></a>
            <a href="/offerte" class="cta-button"><?php echo esc_html(get_theme_mod('phoenix_cta_text', 'Probeer gratis')); ?></a>
            
            <button class="mobile-toggle" onclick="toggleMobileMenu()">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            document.getElementById('phoenixHeader').classList.toggle('menu-active');
        }
    </script>

</header>