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

    /* Hero Section */
    .phoenix-hero {
        background-color: #0b1120;
        color: #ffffff;
        padding: 0 10%; /* Removed top/bottom padding so image can stretch */
        display: flex;
        align-items: stretch; /* Stretches children to full section height */
        justify-content: space-between;
        gap: 60px;
        min-height: 600px; /* Ensures a substantial height for the stretch effect */
        overflow: hidden;
    }

    .hero-text { 
        flex: 1.2; 
        padding: 100px 0; /* Vertical padding moves the text, not the section */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    /* Strict Two-Liner Heading */
    .hero-text h1 {
        font-size: 40px;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 25px;
        max-width: 460px; /* Tight width to force exactly two lines */
        margin-top: 0;
    }

.hero-features {
    list-style: none;
    padding: 0;
    margin-bottom: 35px;
}

.hero-features li {
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    font-size: 16px;
    color: #cbd5e1;
    gap: 8px;  /* Small gap to keep checkmark close to text. Change to 4px for even closer, or 12px for a bit more space. */
    margin-left: 160px;  /* Shifts the entire item (checkmark + text) to the right. Adjust or remove if not needed. */
}

.hero-features li::before {
    content: '✔';
    color: #00d084;
    font-weight: bold;
    /* No gap here—it's not valid on pseudo-elements. Spacing is handled by the li's gap. */
}
    .hero-btns { 
        display: flex; 
        gap: 20px; 
        align-items: flex-start; 
        justify-content: center; /* Added to center the button according to the text */
    }
    
    .btn-col { text-align: center; }

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

    /* Image stretches to top and bottom, slightly lower */
    .hero-image-container { 
        flex: 1; 
        display: flex;
        align-items: flex-end; /* Keeps image base flush at bottom */
    }

    .hero-image-container img { 
        width: 90%; 
        height: 87%; /* Stretches to the very top */
        display: block;
        /* Matches the blob shape with smaller radius on left side */
        border-radius: 50px 180px 0 0; 
        object-fit: cover; 
        object-position: center bottom;
        margin-left: -130px; /* Added to shift the image slightly to the left */
    }

    /* Stats Section */
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

    @media (max-width: 992px) {
        .phoenix-hero { 
            padding: 60px 5% 0 5%; 
            flex-direction: column; 
            text-align: center; 
            min-height: auto; 
            gap: 40px; /* Reduce gap for mobile stacking */
        }
        .hero-text { 
            padding: 0 0 40px 0; 
            flex: none; /* Remove flex grow to allow natural height */
        }
        .hero-text h1 { 
            max-width: 100%; 
            font-size: 32px; /* Smaller font for mobile to fit better */
            line-height: 1.2; /* Adjust line-height for readability */
        }
        .hero-features {
            text-align: center; /* Center the features list text */
        }
        .hero-features li { 
            justify-content: center; 
            margin-left: 0; /* Remove left margin to center properly on mobile */
            font-size: 14px; /* Slightly smaller font for mobile */
        }
        .hero-btns { 
            justify-content: center; 
            flex-direction: column; /* Stack buttons vertically on mobile if needed, but since only one, center it */
            align-items: center; /* Center horizontally in column layout */
            gap: 10px; /* Reduce gap */
        }
        .btn-green {
            padding: 14px 30px; /* Smaller padding for mobile */
            font-size: 16px; /* Smaller font */
        }
        .btn-subtext {
            font-size: 12px; /* Smaller subtext */
        }
        .hero-image-container { 
            align-items: center; /* Center image on mobile */
            margin-top: 20px; /* Add some top margin for spacing */
            /* Removed margin-left to keep image centered on mobile */
        }
        .hero-image-container img { 
            height: auto; 
            width: 100%; /* Full width on mobile */
            max-width: 400px; /* Prevent it from being too large */
            border-radius: 40px; /* Adjust border-radius for mobile */
            object-position: center; /* Center the image */
            margin-left: 0; /* Ensure no left margin on mobile for proper centering */
        }
    }

    /* Additional mobile refinements for smaller screens */
    @media (max-width: 576px) {
        .phoenix-hero {
            padding: 40px 5% 0 5%;
        }
        .hero-text h1 {
            font-size: 28px; /* Even smaller for very small screens */
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
            flex-direction: column; /* Stack stats vertically on very small screens */
            gap: 40px;
        }
        .stat-box h2 {
            font-size: 40px; /* Smaller stats for mobile */
        }
    }
</style>

<main id="site-content" role="main">

    <section class="phoenix-hero">
        <div class="hero-text">
            <h1>Maak moeiteloos een winstgevende website</h1> <!-- Updated to display the specified text -->

            <ul class="hero-features">
                <?php 
                $features = get_field('hero_features'); 
                if ($features) {
                    $features_array = array_filter(array_map('trim', explode("\n", $features)));
                    foreach($features_array as $feature) {
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
            <?php 
            $hero_image = get_field('hero_image'); 
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
            <?php endif; ?>
        </div>
    </section>

    <section class="phoenix-stats">
        <?php for ($i = 1; $i <= 3; $i++) : 
            $stat_title = get_field("stat{$i}_title");
            $stat_desc = get_field("stat{$i}_desc");
            if ($stat_title || $stat_desc): ?>
                <div class="stat-box">
                    <h2><?php echo esc_html($stat_title); ?></h2>
                    <p><?php echo esc_html($stat_desc); ?></p>
                </div>
        <?php endif; endfor; ?>
    </section>

    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>

</main>

<?php get_footer(); ?>