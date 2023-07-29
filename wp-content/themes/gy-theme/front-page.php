<?php
/*
Template Name: Home
*/
get_header();

// POSTS PROJECTS
$args = array(
    'post_type' => 'projects',
    'posts_per_page' => -1,
    'orderby' => 'rand',
    'order' => 'ASC'
);

$projects_cases = new WP_Query($args);
?>

<main>
    <section class="wallpaperMain">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <div class="boxDescription">
                        <div class="titulo">
                            <h1>
                                <?php the_field('titulo_wallpaper'); ?>
                            </h1>
                        </div>
                        <div class="subtitulo">
                            <h2>
                                <?php the_field('descricao_texto'); ?>
                            </h2>
                        </div>
                        <div class="cta d-flex align-items-center gap-3">
                            <div class="botao">
                                <?php
                                $cta_cases = get_field('cta_cases');
                                $cta_contato = get_field('cta_contato');
                                ?>
                                <a href="<?php echo $cta_cases['url']; ?>" rel="noopener noreferrer">
                                    <?php echo $cta_cases['title']; ?>
                                </a>
                            </div>
                            <div class="botao">
                                <a href="<?php echo $cta_contato['url']; ?>" rel="noopener noreferrer">
                                    <?php echo $cta_contato['title']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="imagemWallpaper">
                        <img src="<?php the_field('imagem_wallpaper'); ?>" alt="<?php the_field('titulo_wallpaper'); ?>"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="scrollReveal clientes">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="tituloSection">
                        <h1>
                            <?php the_field('titulo_secao'); ?>
                        </h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="imagem d-flex justify-content-center">
                        <img src="<?php the_field('imagem_clientes'); ?>" alt="<?php the_field('titulo_secao'); ?>"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="scrollReveal avaliacaoGlassdoor">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="boxImagem">
                        <img src="<?php the_field('imagem_secao'); ?>" alt="<?php the_field('titulo_glassdoor'); ?>"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6 my-auto">
                    <div class="boxDescription">
                        <div class="titulo">
                            <h1>
                                <?php the_field('titulo_glassdoor'); ?>
                            </h1>
                        </div>
                        <div class="subtitulo">
                            <h2>
                                <?php the_field('subtitulo_glassdoor'); ?>
                            </h2>
                        </div>
                    </div>
                    <?php
                    $diferenciais_glassdoor = get_field('diferenciais_glassdoor');
                    foreach ($diferenciais_glassdoor as $diferenciais) { ?>
                        <div class="boxFeaturesWork">
                            <div class="row">
                                <div class="col-md-2 my-auto px-0">
                                    <div class="icone">
                                        <?php echo $diferenciais['icone_diferencial'] ?>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="titulo">
                                        <h1>
                                            <?php echo $diferenciais['titulo_diferencial'] ?>
                                        </h1>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <?php echo $diferenciais['descricao_diferencial'] ?>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <section class="scrollReveal cases">
        <div class="container-fluid p-0 m-0">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="boxTitulo text-center my-4">
                        <h1>
                            <?php the_field('titulo_cases'); ?>
                        </h1>
                    </div>
                    <div class="boxCarousel">
                        <div class="owl-carousel owl-theme">
                            <?php
                            if ($projects_cases->have_posts()):
                                while ($projects_cases->have_posts()):
                                    $projects_cases->the_post();
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
                                    $title = get_the_title();
                                    $excerpt = get_the_excerpt();
                                    $link = get_permalink();
                                    $categories = get_the_category();
                                    ?>
                                    <div class="boxCase">
                                        <div class="imagemCase" style="background-image:url(<?php echo $thumbnail_url; ?>)">
                                            <div class="boxContent">
                                                <div class="box">
                                                    <div class="titulo">
                                                        <h1>
                                                            <?php echo $title; ?>
                                                        </h1>
                                                    </div>
                                                    <div class="categorias">
                                                        <p>
                                                            <?php foreach ($categories as $category): ?>
                                                                <?php echo $category->name; ?>
                                                                <?php if ($category !== end($categories))
                                                                    echo ', '; ?>
                                                            <?php endforeach; ?>
                                                        </p>
                                                    </div>
                                                    <div class="botao">
                                                        <a href="<?php echo $link; ?>" rel="noopener noreferrer">
                                                            Saiba mais
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="scrollReveal feedbacks">
        <div class="container-fluid p-0 m-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="titulo text-center">
                        <h1>
                            <?php the_field('titulo_feedbacks'); ?>
                        </h1>
                    </div>
                    <div class="owl-carousel owl-theme">
                        <?php
                        $testemunho_cliente = get_field('testemunho_cliente');
                        foreach ($testemunho_cliente as $testemunha) { ?>
                            <div class="boxFeedback">
                                <div class="header d-flex align-items-center gap-3">
                                    <div class="imageUser">
                                        <img src="<?php echo $testemunha['imagem_cliente']; ?>"
                                            alt="<?php echo $testemunha['nome_cliente']; ?>" class="img-fluid">
                                    </div>
                                    <div class="infoUser">
                                        <div class="nomeUser">
                                            <p>
                                                <?php echo $testemunha['nome_cliente']; ?>
                                            </p>
                                        </div>
                                        <div class="cargoUser">
                                            <span>
                                                <?php echo $testemunha['cargo_cliente']; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="conteudoFeedback">
                                    <p>
                                        <?php echo $testemunha['texto_cliente']; ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="scrollReveal contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="infoContact">
                        <div class="titulo">
                            <h1>
                                <?php the_field('titulo_contato'); ?>
                            </h1>
                        </div>
                        <div class="subtitulo">
                            <h2>
                                <?php the_field('subtitulocontato'); ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-auto">
                    <div class="botao">
                        <?php
                        $link_cta = get_field('link_cta');
                        ?>
                        <a href="<?php echo $link_cta['url']; ?>" rel="noopener noreferrer">
                            <?php echo $link_cta['title']; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>