<footer class="footer">
    <div class="footer__container">
        <div class="footer__content">
            <div class="footer__section footer__section--contact">
                <h3 class="footer__heading">Area Tourism Office</h3>
                <p class="footer__text">123 Tourism Street<br>
                Area City, BC V0N 1A0</p>
                <p class="footer__text">Phone: <a href="tel:+12501234567" class="footer__link">+1 (250) 123-4567</a><br>
                Email: <a href="mailto:info@areatourism.com" class="footer__link">info@areatourism.com</a></p>
            </div>
            
            <div class="footer__section footer__section--hours">
                <h3 class="footer__heading">Hours of Operation</h3>
                <p class="footer__text">Monday - Friday: 9:00 AM - 5:00 PM<br>
                Saturday: 10:00 AM - 4:00 PM<br>
                Sunday: Closed</p>
            </div>
            
            <div class="footer__section footer__section--links">
                <h3 class="footer__heading">Quick Links</h3>
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="<?php echo get_post_type_archive_link('accommodation'); ?>" class="footer__link">Accommodations</a></li>
                    <li class="footer__list-item"><a href="<?php echo get_post_type_archive_link('activity'); ?>" class="footer__link">Activities</a></li>
                    <li class="footer__list-item"><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="footer__link">Contact Us</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer__bottom">
            <p class="footer__text">&copy; <?php echo date('Y'); ?> Area Tourism Office. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
