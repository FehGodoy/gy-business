<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <?php wp_head(); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg px-4">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                        alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div id="close">
                    <i class="fas fa-times"></i>
                </div>
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'Menu Principal',
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse ms-auto',
                        'container_id' => 'navbarNav',
                        'menu_class' => 'nav navbar-nav ms-auto',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()
                    )
                );
                ?>
            </div>
        </nav>


    </header>