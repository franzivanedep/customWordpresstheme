<h1><?php the_field('hero_title'); ?></h1>
<img src="<?php echo esc_url(get_field('hero_image')['url']); ?>" alt="Hero Image">

<ul class="hero-features">
<?php if( have_rows('hero_features') ):
    while( have_rows('hero_features') ): the_row();
        echo '<li>' . esc_html(get_sub_field('feature')) . '</li>';
    endwhile;
endif; ?>
</ul>

<div class="phoenix-stats">
<?php if( have_rows('stats') ):
    while( have_rows('stats') ): the_row(); ?>
        <div class="stat-box">
            <h2><?php the_sub_field('stat_title'); ?></h2>
            <p><?php the_sub_field('stat_description'); ?></p>
        </div>
<?php endwhile; endif; ?>
</div>
