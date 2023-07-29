<?php
get_header();
?>

<main>
<section class="page-404">
    <div class="container">
    <div id='oopss'>
    <div id='error-text'>
        <img src="<?php echo get_template_directory_uri();?>/assets/images/error.svg" alt="404">
        <span>404</span>
        <p class="p-a">
           Não foi possível encontrar a página que você procura</p>
        <a href='<?php echo site_url();?>' class="back">... Voltar a página inicial</a>
    </div>
</div>
    </div>
</section>

</main>

<?php get_footer(); ?>