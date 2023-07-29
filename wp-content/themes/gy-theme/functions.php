<?php
function estilos_scripts()
{
  wp_enqueue_script('script-js', get_template_directory_uri() . '/assets/min/js/all.min.js');
  wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/min/css/style.css');
}

add_action('wp_enqueue_scripts', 'estilos_scripts');


function setup_theme()
{
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'setup_theme');


add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
  if (in_array('current-menu-item', $classes)) {
    $classes[] = 'active ';
  }
  return $classes;
}


add_theme_support('menus');
add_theme_support('widgets');
add_theme_support('woocommerce');
add_theme_support('post-thumbnails');

require_once get_template_directory() . "/wp_bootstrap_navwalker.php";
function register_my_menus()
{
  register_nav_menus(
    array(
      'menu-principal' => __('Menu Principal'),
    )
  );
}

add_action('init', 'register_my_menus');


?>