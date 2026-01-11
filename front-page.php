<?php
/**
 * Template Name: Phoenix Front Page - Full Height
 */
get_header();
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    .phoenix-hero, .phoenix-stats {
        font-family: 'Poppins', sans-serif;
    }

    /* ================= HERO SECTION ================= */
    .phoenix-hero {
        background-color: #0b1120;
        color: #ffffff;
        padding: 0 10%;
        display: flex;
        align-items: stretch;
        justify-content: space-between;
        gap: 60px;
        min-height: 600px;
        overflow: hidden;
    }

    .hero-text { 
        flex: 1.2; 
        padding: 100px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .hero-text h1 {
        font-size: 40px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 25px;
        max-width: 460px;
        margin-top: 0;
    }

    /* ================= FEATURES ================= */
    .hero-features {
        list-style: none;
        padding: 0;
        margin-bottom: 35px;
    }

    .hero-features li {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 18px;
        color: #ffffff;
        margin-bottom: 12px;
        margin-left: 160px; /* desktop offset */
    }

    .hero-features li::before {
        content: '✔';
        color: #00d084;
        font-weight: bold;
    }

    /* ================= BUTTON ================= */
    .hero-btns { 
        display: flex; 
        justify-content: center;
    }
    
    .btn-col {
        text-align: center;
    }

    .btn-green {
        background-color: #00d084;
        color: white;
        padding: 16px 45px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 700;
        display: inline-block;
        font-size: 18px;
    }

    .btn-subtext {
        display: block;
        font-size: 13px;
        color: #94a3b8;
        margin-top: 10px;
    }

    /* ================= IMAGE ================= */
    .hero-image-container { 
        flex: 1; 
        display: flex;
        align-items: flex-end;
    }

    .hero-image-container img { 
        width: 90%; 
        height: 87%;
        display: block;
        border-radius: 50px 180px 0 0;
        object-fit: cover; 
        object-position: center bottom;
        margin-left: -130px;
    }

    /* ================= STATS ================= */
    .phoenix-stats {
        padding: 80px 10%;
        background: #ffffff;
        display: flex;
        justify-content: space-around;
        text-align: center;
    }

    .stat-box h2 {
        color: #8b5cf6; 
        font-size: 52px;
        font-weight: 700;
        margin: 0;
    }

    .stat-box p {
        color: #1e293b;
        font-weight: 600;
        margin-top: 8px;
    }

    /* ================= TABLET & MOBILE ================= */
    @media (max-width: 992px) {

        .phoenix-hero { 
            padding: 60px 5% 0;
            flex-direction: column;
            min-height: auto;
            gap: 40px;
        }

        .hero-text {
            padding: 0 0 40px;
        }

        .hero-text h1 {
            max-width: 100%;
            font-size: 32px;
            line-height: 1.2;
            text-align: center;
        }

        /* KEEP SAME ALIGNMENT AS DESKTOP */
        .hero-features {
            text-align: left;
        }

        .hero-features li {
            justify-content: flex-start;
            margin-left: 0; /* remove desktop offset */
            font-size: 14px;
        }

        .hero-btns {
            justify-content: center;
        }

        .btn-green {
            padding: 14px 30px;
            font-size: 16px;
        }

        .hero-image-container {
            align-items: center;
        }

        .hero-image-container img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-left: 0;
        }
    }

    /* ================= SMALL MOBILE ================= */
    @media (max-width: 576px) {

        .hero-text h1 {
            font-size: 28px;
        }

        .hero-features li {
            font-size: 13px;
        }

        .btn-green {
            padding: 12px 25px;
            font-size: 15px;
        }

        .phoenix-stats {
            padding: 60px 5%;
            flex-direction: column;
            gap: 40px;
        }

        .stat-box h2 {
            font-size: 40px;
        }
    }
</style>

<main id="site-content" role="main">

    <section class="phoenix-hero">
        <div class="hero-text">
            <h1>Maak moeiteloos een winstgevende website</h1>

            <ul class="hero-features">
                <?php 
                $features = get_field('hero_features'); 
                if ($features) {
                    foreach (array_filter(array_map('trim', explode("\n", $features))) as $feature) {
                        echo '<li>' . esc_html($feature) . '</li>';
                    }
                }
                ?>
            </ul>

            <div class="hero-btns">
                <div class="btn-col">
                    <a href="<?php the_field('hero_cta_url'); ?>" class="btn-green">
                        <?php the_field('hero_cta_text'); ?>
                    </a>
                    <span class="btn-subtext"><?php the_field('hero_cta_subtext'); ?></span>
                </div>
            </div>
        </div>

        <div class="hero-image-container">
            <?php $hero_image = get_field('hero_image'); ?>
            <?php if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
            <?php endif; ?>
        </div>
    </section>

    <section class="phoenix-stats">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php if (get_field("stat{$i}_title") || get_field("stat{$i}_desc")): ?>
                <div class="stat-box">
                    <h2><?php the_field("stat{$i}_title"); ?></h2>
                    <p><?php the_field("stat{$i}_desc"); ?></p>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </section>

    <?php
    while (have_posts()) {
        the_post();
        the_content();
    }
    ?>

</main>

<?php get_footer(); ?>
