<?php
/**
 * Template Name: Plan Your Trip
 */

get_header();
?>

<main class="site-main">
    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero__content">
                <h1 class="hero__title">Plan Your Perfect Trip</h1>
                <p class="hero__subtitle">Discover the best of our region with our comprehensive trip planning resources</p>
            </div>
            <div class="hero__image">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/trip_planning.png'); ?>" 
                     alt="Plan Your Trip" 
                     class="hero__img">
            </div>
        </section>

        <!-- Trip Planning Tools -->
        <section class="trip-tools">
            <h2 class="section-title">Trip Planning Tools</h2>
            <div class="tools-grid">
                <div class="tool-card">
                    <div class="tool-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/map.png'); ?>" 
                             alt="Interactive Map">
                    </div>
                    <h3 class="tool-card__title">Interactive Map</h3>
                    <p class="tool-card__description">Explore our region with our interactive map featuring points of interest, accommodations, and activities.</p>
                    <a href="#" class="button">View Map</a>
                </div>

                <div class="tool-card">
                    <div class="tool-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/travel_guide.png'); ?>" 
                             alt="Travel Guide">
                    </div>
                    <h3 class="tool-card__title">Travel Guide</h3>
                    <p class="tool-card__description">Download our comprehensive travel guide with insider tips and must-see attractions.</p>
                    <a href="#" class="button">Download Guide</a>
                </div>

                <div class="tool-card">
                    <div class="tool-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tours.png'); ?>" 
                             alt="Tours & Activities">
                    </div>
                    <h3 class="tool-card__title">Tours & Activities</h3>
                    <p class="tool-card__description">Browse and book guided tours, outdoor activities, and unique experiences.</p>
                    <a href="#" class="button">View Tours</a>
                </div>
            </div>
        </section>

        <!-- Seasonal Guide -->
        <section class="seasonal-guide">
            <h2 class="section-title">Seasonal Guide</h2>
            <div class="seasons-grid">
                <div class="season-card">
                    <h3 class="season-card__title">Spring</h3>
                    <ul class="season-card__list">
                        <li>Wildflower viewing</li>
                        <li>Hiking trails</li>
                        <li>Fishing season begins</li>
                        <li>Local festivals</li>
                    </ul>
                </div>

                <div class="season-card">
                    <h3 class="season-card__title">Summer</h3>
                    <ul class="season-card__list">
                        <li>Water activities</li>
                        <li>Camping</li>
                        <li>Music festivals</li>
                        <li>Farmers markets</li>
                    </ul>
                </div>

                <div class="season-card">
                    <h3 class="season-card__title">Fall</h3>
                    <ul class="season-card__list">
                        <li>Fall foliage tours</li>
                        <li>Harvest festivals</li>
                        <li>Wildlife viewing</li>
                        <li>Hiking</li>
                    </ul>
                </div>

                <div class="season-card">
                    <h3 class="season-card__title">Winter</h3>
                    <ul class="season-card__list">
                        <li>Skiing & snowboarding</li>
                        <li>Snowshoeing</li>
                        <li>Winter festivals</li>
                        <li>Cozy accommodations</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Travel Tips -->
        <section class="travel-tips">
            <h2 class="section-title">Travel Tips</h2>
            <div class="tips-grid">
                <div class="tip-card">
                    <h3 class="tip-card__title">Getting Here</h3>
                    <ul class="tip-card__list">
                        <li>Nearest airports and distances</li>
                        <li>Public transportation options</li>
                        <li>Driving directions</li>
                        <li>Parking information</li>
                    </ul>
                </div>

                <div class="tip-card">
                    <h3 class="tip-card__title">What to Pack</h3>
                    <ul class="tip-card__list">
                        <li>Seasonal clothing recommendations</li>
                        <li>Essential gear for activities</li>
                        <li>Local weather patterns</li>
                        <li>Special items to bring</li>
                    </ul>
                </div>

                <div class="tip-card">
                    <h3 class="tip-card__title">Local Customs</h3>
                    <ul class="tip-card__list">
                        <li>Cultural etiquette</li>
                        <li>Local traditions</li>
                        <li>Language tips</li>
                        <li>Dining customs</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta-section">
            <h2 class="cta-section__title">Need Help Planning?</h2>
            <p class="cta-section__text">Our tourism office is here to help you create the perfect itinerary.</p>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="button button--primary">Contact Us</a>
        </section>
    </div>
</main>

<?php get_footer(); ?> 