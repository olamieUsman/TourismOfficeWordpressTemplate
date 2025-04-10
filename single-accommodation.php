<?php get_header(); ?>

<main class="site-main">
    <?php while (have_posts()) : the_post(); 
        $category = get_field('accommodation_category');
        $phone = get_field('accommodation_phone');
        $email = get_field('accommodation_email');
        $website = get_field('accommodation_website');
        $address = get_field('accommodation_address');
    ?>
        <article class="accommodation-single">
            <!-- Hero Section -->
            <div class="accommodation-hero">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="accommodation-hero-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
                <div class="accommodation-hero-content">
                    <div class="container">
                        <?php if ($category) : ?>
                            <div class="accommodation-category"><?php echo esc_html($category); ?></div>
                        <?php endif; ?>
                        <h1 class="accommodation-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="accommodation-content-wrapper">
                    <!-- Main Content -->
                    <div class="accommodation-main-content">
                        <div class="accommodation-description">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="accommodation-sidebar">
                        <div class="accommodation-info-box">
                            <h2>Property Information</h2>
                            
                            <?php if ($phone) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-phone"></i> Contact</h3>
                                    <p><a href="tel:<?php echo esc_attr(str_replace(['-', ' '], '', $phone)); ?>">
                                        <?php echo esc_html($phone); ?>
                                    </a></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($email) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-envelope"></i> Email</h3>
                                    <p><a href="mailto:<?php echo esc_attr($email); ?>">
                                        <?php echo esc_html($email); ?>
                                    </a></p>
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

                            <?php if ($address) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-map-marker-alt"></i> Location</h3>
                                    <p><?php echo esc_html($address); ?></p>
                                    <a href="https://maps.google.com?q=<?php echo urlencode($address); ?>" 
                                       class="map-link" 
                                       target="_blank" 
                                       rel="noopener noreferrer">View on Google Maps</a>
                                </div>
                            <?php endif; ?>

                            <?php if (have_rows('amenities')) : ?>
                                <div class="info-item">
                                    <h3><i class="fas fa-list"></i> Amenities</h3>
                                    <ul class="amenities-list">
                                        <?php while (have_rows('amenities')) : the_row(); ?>
                                            <li><?php the_sub_field('amenity'); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <!-- Visitor Information -->
                            <div class="info-item">
                                <h3><i class="fas fa-info-circle"></i> Visitor Information</h3>
                                <div class="visitor-info">
                                    <p><strong>Tourism Office:</strong> Area Tourism Office</p>
                                    <p><strong>Phone:</strong> <a href="tel:+12501234567">+1 (250) 123-4567</a></p>
                                    <p><strong>Email:</strong> <a href="mailto:info@areatourism.com">info@areatourism.com</a></p>
                                    <p><strong>Address:</strong> 123 Tourism Street, Area City, BC V0N 1A0</p>
                                    <p><strong>Hours:</strong> Monday - Friday: 9:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- Related Accommodations -->
                <section class="related-accommodations">
                    <h2>More Places to Stay</h2>
                    <div class="listings-grid">
                        <?php
                        $related_accommodations = new WP_Query(array(
                            'post_type' => 'accommodation',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'meta_query' => array(
                                array(
                                    'key' => 'accommodation_category',
                                    'value' => $category,
                                    'compare' => '='
                                )
                            )
                        ));

                        if ($related_accommodations->have_posts()) :
                            while ($related_accommodations->have_posts()) : $related_accommodations->the_post();
                                $rel_category = get_field('accommodation_category');
                                $rel_phone = get_field('accommodation_phone');
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

                <!-- Back to Accommodations -->
                <div class="back-to-accommodations">
                    <a href="<?php echo get_post_type_archive_link('accommodation'); ?>" class="button button--text">
                        <i class="fas fa-arrow-left"></i> Back to All Accommodations
                    </a>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>