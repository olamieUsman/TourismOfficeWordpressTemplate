<?php get_header(); ?>

<main class="site-main">
    <div class="page-header">
        <div class="container">
            <h1>PLACES TO STAY</h1>
            <p>Find your perfect accommodation, from cozy B&Bs to luxury hotels. Whether you're looking for a romantic getaway or a family vacation, we have the perfect place for you.</p>
        </div>
    </div>

    <div class="container">
        <!-- Featured Listings Section -->
        <section class="featured-listings">
            <h2>Featured Places to Stay</h2>
            <div class="listings-grid">
                <?php
                $featured_accommodations = new WP_Query(array(
                    'post_type' => 'accommodation',
                    'posts_per_page' => 3,
                    'meta_query' => array(
                        array(
                            'key' => 'featured_accommodation',
                            'value' => '1',
                            'compare' => '='
                        )
                    )
                ));

                if($featured_accommodations->have_posts()) :
                    while($featured_accommodations->have_posts()) : $featured_accommodations->the_post();
                        $category = get_field('accommodation_category');
                        $phone = get_field('accommodation_phone');
                ?>
                        <article class="listing-card">
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="listing-image">
                                    <?php the_post_thumbnail('medium_large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="listing-content">
                                <h3><?php the_title(); ?></h3>
                                <?php if($category) : ?>
                                    <p class="category"><?php echo esc_html($category); ?></p>
                                <?php endif; ?>
                                <?php if($phone) : ?>
                                    <p class="phone"><?php echo esc_html($phone); ?></p>
                                <?php endif; ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="button">View Listing</a>
                            </div>
                        </article>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Filter Links -->
        <section class="filter-section">
            <div class="filter-links">
                <button class="filter-button active" data-filter="all">All</button>
                <button class="filter-button" data-filter="hotel">Hotels</button>
                <button class="filter-button" data-filter="bb">Bed & Breakfasts</button>
                <button class="filter-button" data-filter="resort">Resorts</button>
                <button class="filter-button" data-filter="camping">Camping & RV</button>
                <button class="filter-button" data-filter="vacation_rental">Vacation Rentals</button>
            </div>
        </section>

        <!-- All Listings Section -->
        <section class="all-listings">
            <div class="listings-grid">
                <?php
                $args = array(
                    'post_type' => 'accommodation',
                    'posts_per_page' => -1,
                );
                $accommodations = new WP_Query($args);

                if($accommodations->have_posts()) :
                    while($accommodations->have_posts()) : $accommodations->the_post();
                        $category = get_field('accommodation_category');
                        $phone = get_field('accommodation_phone');
                        $category_class = sanitize_title($category);
                ?>
                        <article class="listing-card" data-category="<?php echo esc_attr($category_class); ?>">
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="listing-image">
                                    <?php the_post_thumbnail('medium_large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="listing-content">
                                <h3><?php the_title(); ?></h3>
                                <?php if($category) : ?>
                                    <p class="category">Category: <?php echo esc_html($category); ?></p>
                                <?php endif; ?>
                                <?php if($phone) : ?>
                                    <p class="phone"><?php echo esc_html($phone); ?></p>
                                <?php endif; ?>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="button">View Listing</a>
                            </div>
                        </article>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p class="no-results">No accommodations found.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Back to Top Link -->
        <div class="back-to-top">
            <a href="#" class="button button--text">Back to top</a>
        </div>
    </div>

    <!-- Visitor Information Section -->
    <section class="visitor-information">
        <div class="container">
            <h2>VISITOR INFORMATION</h2>
            <p>Drop by the Tourism Office for friendly and professional help booking tours and accommodation.<br>
            Our extensive local knowledge will help you get the most out of your stay.<br>
            Find us at the government dock.</p>
        </div>
    </section>

    <!-- Footer Navigation -->
    <section class="footer-nav">
        <div class="container">
            <div class="footer-nav-grid">
                <div class="footer-col">
                    <h3>About Us</h3>
                    <p>Whether it's for a few hours or a few days, there's always something to do in our area. From whale watching to hiking, kayaking to shopping, you'll find it all here.</p>
                </div>
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Fishing Charters, Tours and Restaurants</a></li>
                        <li><a href="#">Accommodations</a></li>
                        <li><a href="#">Plan your trip</a></li>
                        <li><a href="#">Local Amenities</a></li>
                        <li><a href="#">Weddings</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Connect with us and other visitors</h3>
                    <p>info@visitArea.ca</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i> #VisitArea</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>