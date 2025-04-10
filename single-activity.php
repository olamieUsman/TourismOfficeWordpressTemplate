<?php get_header(); ?>

<main class="site-main">
    <?php while (have_posts()) : the_post(); 
        $category = get_field('activity_category');
        $phone = get_field('activity_phone');
        $address = get_field('activity_address');
        $website = get_field('activity_website');
        $hours = get_field('activity_hours');
    ?>
        <article class="activity-single">
            <!-- Hero Section -->
            <div class="activity-hero">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="activity-hero-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
                <div class="activity-hero-content">
                    <div class="container">
                        <?php if ($category) : ?>
                            <div class="activity-category"><?php echo esc_html($category); ?></div>
                        <?php endif; ?>
                        <h1 class="activity-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="activity-content-wrapper">
                    <!-- Main Content -->
                    <div class="activity-main-content">
                        <div class="activity-description">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="activity-sidebar">
                        <div class="activity-info-box">
                            <h2>Business Information</h2>
                            
                            <?php if ($phone) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-phone"></i> Contact</h3>
                                    <p><a href="tel:<?php echo esc_attr(str_replace(['-', ' '], '', $phone)); ?>">
                                        <?php echo esc_html($phone); ?>
                                    </a></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($address) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-map-marker-alt"></i> Location</h3>
                                    <p><?php echo esc_html($address); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($website) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-globe"></i> Website</h3>
                                    <p><a href="<?php echo esc_url($website); ?>" target="_blank" rel="noopener noreferrer">
                                        Visit Website
                                    </a></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($hours) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-clock"></i> Business Hours</h3>
                                    <div class="business-hours">
                                        <?php echo nl2br(esc_html($hours)); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </aside>
                </div>

                <!-- Related Activities -->
                <section class="related-activities">
                    <h2>More Activities to Explore</h2>
                    <div class="listings-grid">
                        <?php
                        $related_activities = new WP_Query(array(
                            'post_type' => 'activity',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'meta_query' => array(
                                array(
                                    'key' => 'activity_category',
                                    'value' => $category,
                                    'compare' => '='
                                )
                            )
                        ));

                        if ($related_activities->have_posts()) :
                            while ($related_activities->have_posts()) : $related_activities->the_post();
                                $rel_category = get_field('activity_category');
                                $rel_phone = get_field('activity_phone');
                        ?>
                                <article class="listing-card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="listing-image">
                                            <?php the_post_thumbnail('medium_large'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="listing-content">
                                        <h3><?php the_title(); ?></h3>
                                        <?php if ($rel_category) : ?>
                                            <p class="category"><?php echo esc_html($rel_category); ?></p>
                                        <?php endif; ?>
                                        <?php if ($rel_phone) : ?>
                                            <p class="phone"><?php echo esc_html($rel_phone); ?></p>
                                        <?php endif; ?>
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>" class="button">View Details</a>
                                    </div>
                                </article>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </section>

                <!-- Back to Activities -->
                <div class="back-to-activities">
                    <a href="<?php echo get_post_type_archive_link('activity'); ?>" class="button button--text">
                        <i class="fas fa-arrow-left"></i> Back to All Activities
                    </a>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>