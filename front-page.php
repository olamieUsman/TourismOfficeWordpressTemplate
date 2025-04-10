<?php get_header(); ?>

<main class="site-main">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Explore Our Beautiful Region</h1>
            <p>Discover stunning landscapes, exciting activities, and comfortable accommodations for your perfect getaway.</p>
            <a href="#discover" class="button">Discover our Local Area</a>
        </div>
    </section>

    <!-- Things to Do Section -->
    <section class="things-to-do" id="discover">
        <div class="container">
            <h2>Things to Do</h2>
            <p>Explore our wide range of activities and attractions that make our region unique.</p>
            
            <div class="featured-listings">
                <?php
                $featured_activities = get_field('featured_activities');
                if($featured_activities):
                    foreach($featured_activities as $activity_id):
                        $activity = get_post($activity_id);
                        if($activity):
                            setup_postdata($activity);
                ?>
                    <article class="listing-card">
                        <?php if(has_post_thumbnail($activity->ID)): ?>
                            <?php echo get_the_post_thumbnail($activity->ID, 'medium'); ?>
                        <?php endif; ?>
                        <h3><?php echo get_the_title($activity->ID); ?></h3>
                        <?php 
                        $phone = get_field('activity_phone', $activity->ID);
                        $address = get_field('activity_address', $activity->ID);
                        $hours = get_field('activity_hours', $activity->ID);
                        ?>
                        <?php if($phone): ?>
                            <p class="phone"><strong>Phone:</strong> <?php echo esc_html($phone); ?></p>
                        <?php endif; ?>
                        <?php if($address): ?>
                            <p class="address"><strong>Location:</strong> <?php echo esc_html($address); ?></p>
                        <?php endif; ?>
                        <a href="<?php echo get_permalink($activity->ID); ?>" class="button">View Details</a>
                    </article>
                <?php 
                        endif;
                    endforeach;
                    wp_reset_postdata();
                else:
                ?>
                    <p class="no-results">No featured activities available.</p>
                <?php endif; ?>
            </div>
            <a href="<?php echo get_post_type_archive_link('activity'); ?>" class="button button--dark">View All Activities</a>
        </div>
    </section>

    <!-- Places to Stay Section -->
    <section class="places-to-stay">
        <div class="container">
            <h2>Places to Stay</h2>
            <p>Find the perfect accommodation for your visit, from cozy B&Bs to luxury hotels.</p>
            
            <div class="featured-listings">
                <?php
                $featured_accommodations = get_field('featured_accommodations');
                if($featured_accommodations):
                    foreach($featured_accommodations as $accommodation):
                ?>
                    <article class="listing-card">
                        <?php if(has_post_thumbnail($accommodation->ID)): ?>
                            <?php echo get_the_post_thumbnail($accommodation->ID, 'medium'); ?>
                        <?php endif; ?>
                        <h3><?php echo get_the_title($accommodation->ID); ?></h3>
                        <?php 
                        $phone = get_field('accommodation_phone', $accommodation->ID);
                        $address = get_field('accommodation_address', $accommodation->ID);
                        $amenities = get_field('accommodation_amenities', $accommodation->ID);
                        ?>
                        <?php if($phone): ?>
                            <p class="phone"><strong>Phone:</strong> <?php echo esc_html($phone); ?></p>
                        <?php endif; ?>
                        <?php if($address): ?>
                            <p class="address"><strong>Location:</strong> <?php echo esc_html($address); ?></p>
                        <?php endif; ?>
                        <a href="<?php echo get_permalink($accommodation->ID); ?>" class="button">View Details</a>
                    </article>
                <?php 
                    endforeach;
                else:
                ?>
                    <p class="no-results">No featured accommodations available.</p>
                <?php endif; ?>
            </div>
            <a href="<?php echo get_post_type_archive_link('accommodation'); ?>" class="button button--dark">View All Accommodations</a>
        </div>
    </section>

    <!-- Wedding Section -->
    <section class="wedding-destination">
        <div class="container">
            <h2>Your Premier Wedding Destination</h2>
            <p>Create unforgettable memories in our stunning venues. Perfect for intimate ceremonies or grand celebrations.</p>
            <a href="/weddings" class="button">Learn about your wedding options</a>
        </div>
    </section>

    <!-- Trip Planning Section -->
    <section class="trip-planning">
        <div class="container">
            <div class="trip-planning__content">
                <div class="trip-planning__image">
                    <img src="<?php echo get_theme_file_uri('assets/images/trip_planning.png'); ?>" alt="Plan your trip">
                </div>
                <div class="trip-planning__text">
                    <h2>Everything you need to plan your trip</h2>
                    <ul class="planning-resources">
                        <li>Comprehensive travel guides</li>
                        <li>Local transportation information</li>
                        <li>Seasonal events calendar</li>
                        <li>Dining recommendations</li>
                        <li>Booking assistance</li>
                    </ul>
                    <div class="button-group">
                        <a href="/plan-your-trip" class="button">Plan Your Trip</a>
                        <a href="/getting-here" class="button button--outline">How to Get Here</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Culture Section -->
    <section class="culture-section">
        <div class="container">
            <h2>An Area Rich in Culture</h2>
            <div class="video-gallery">
                <div class="video-container">
                    <iframe 
                        width="100%" 
                        height="200" 
                        src="https://www.youtube.com/embed/B47sqyvaMpk" 
                        title="Destination Culture Video" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <a href="/culture" class="button">Learn about our Culture</a>
            </div>
        </div>
    </section>

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
