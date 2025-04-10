<?php
/**
 * Template Name: Contact Us
 */

get_header();
?>

<main class="site-main">
    <div class="contact">
        <div class="contact__grid">
            <!-- Left Column - Contact Information -->
            <div class="contact__info">
                <div class="info-card">
                    <h2 class="info-card__title">Get In Touch With Us Now!</h2>
                    
                    <!-- Phone -->
                    <div class="info-card__item">
                        <div class="info-card__header">
                            <i class="fas fa-phone info-card__icon"></i>
                            <h3 class="info-card__subtitle">Phone Number</h3>
                        </div>
                        <div class="info-card__content">
                            <a href="tel:+12501234567" class="info-card__link">+1 (250) 123-4567</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="info-card__item">
                        <div class="info-card__header">
                            <i class="fas fa-envelope info-card__icon"></i>
                            <h3 class="info-card__subtitle">Email</h3>
                        </div>
                        <div class="info-card__content">
                            <a href="mailto:info@areatourism.com" class="info-card__link">info@areatourism.com</a><br>
                            <a href="mailto:sales@areatourism.com" class="info-card__link">sales@areatourism.com</a>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="info-card__item">
                        <div class="info-card__header">
                            <i class="fas fa-map-marker-alt info-card__icon"></i>
                            <h3 class="info-card__subtitle">Location</h3>
                        </div>
                        <div class="info-card__content">
                            123 Tourism Street<br>
                            Area City, BC V0N 1A0
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="info-card__item">
                        <div class="info-card__header">
                            <i class="fas fa-clock info-card__icon"></i>
                            <h3 class="info-card__subtitle">Working Hours</h3>
                        </div>
                        <div class="info-card__content">
                            Monday To Saturday<br>
                            09:00 AM To 06:00 PM
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Contact Form -->
            <div class="contact__form">
                <div class="form-card">
                    <h2 class="form-card__title">Contact Us</h2>
                    <form class="form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" novalidate>
                        <input type="hidden" name="action" value="submit_contact_form">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_form_nonce'); ?>

                        <div class="form__grid">
                            <!-- First Name -->
                            <div class="form__field form__field--half">
                                <label class="form__label form__label--required">First Name</label>
                                <input type="text" class="form__input" name="first_name" required>
                            </div>

                            <!-- Last Name -->
                            <div class="form__field form__field--half">
                                <label class="form__label">Last Name</label>
                                <input type="text" class="form__input" name="last_name">
                            </div>

                            <!-- Mobile No -->
                            <div class="form__field form__field--half">
                                <label class="form__label form__label--required">Mobile No</label>
                                <input type="tel" class="form__input" name="phone" required>
                            </div>

                            <!-- Email -->
                            <div class="form__field form__field--half">
                                <label class="form__label form__label--required">Email ID</label>
                                <input type="email" class="form__input" name="email" required>
                            </div>

                            <!-- Message -->
                            <div class="form__field">
                                <label class="form__label">Message</label>
                                <textarea class="form__input form__input--textarea" name="message" rows="4"></textarea>
                            </div>

                            <!-- Captcha -->
                            <div class="form__field">
                                <label class="form__label form__label--required">Please type the characters</label>
                                <input type="text" class="form__input" name="captcha" required>
                                <div class="form__captcha">
                                    <img src="path-to-captcha-image" alt="CAPTCHA" class="form__captcha-image">
                                </div>
                                <small class="form__helper-text">This helps us prevent spam, thank you.</small>
                            </div>

                            <!-- Submit Button -->
                            <div class="form__field">
                                <button type="submit" class="form__button">
                                    Submit <i class="fas fa-paper-plane form__button-icon"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 