<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="logoSite">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                        alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid">
                </div>
            </div>
            <div class="menuFooter">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu' => 'Menu Principal',
                    ));
                ?>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p> Copyright © <?php echo date('Y'); ?> - <?php echo get_bloginfo('name'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>