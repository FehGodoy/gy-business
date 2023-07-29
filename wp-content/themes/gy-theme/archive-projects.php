<?php

get_header();

// Pegar categorias
$args = array(
    'taxonomy' => 'category',
    'post_type' => 'projects',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false,
    'parent' => 0,
    'exclude' => get_cat_ID('Sem categoria')
);

$projetos = get_terms($args);
?>


<main>
    <section class="pageTitle">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <h1>
                        Cases de Sucesso
                    </h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="<?php echo site_url(); ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo get_post_type_archive_link('projects'); ?>"><?php echo get_the_archive_title(); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="headerProject">
        <div class="container">
            <div class="row">
                <div class="col-md-10 my-4">
                    <div class="buttonFilterActive d-flex align-items-center gap-2">
                        <div class="icone">
                            <i class="fa-solid fa-filter"></i>
                        </div>
                        <div class="titulo">
                            <p class="mb-0">Filtrar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" id="colunagemFiltro">
                    <div class="boxAllFiltros d-flex align-items-center justify-content-between">
                        <div class="tituloFiltros">
                            <h1>Filtrar por</h1>
                        </div>
                        <div class="iconeClose">
                            <i class="fa-solid fa-x"></i>
                        </div>
                    </div>
                    <div class="filtro">
                        <div class="boxTipoFiltro d-flex align-items-center justify-content-between">
                            <div class="tituloFiltro">
                                <p>Tipo</p>
                            </div>
                            <div class="iconeFiltro">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="conteudoFiltro">
                            <ul>
                                <li data-filter="all">
                                    Todos
                                </li>
                                <?php
                                foreach ($projetos as $project) { ?>
                                    <li data-filter=".<?php echo $project->slug; ?>">
                                        <?php echo $project->name; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="colunagemProd">
                    <div class="boxPosts">
                        <div class="row">
                            <?php
                            if (have_posts()):
                                while (have_posts()):
                                    the_post();
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
                                    $excerpt = get_the_excerpt();
                                    $link = get_permalink();
                                    $categories = get_the_terms(get_the_ID(), 'category');
                                    $category_classes = '';
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            $category_classes .= ' ' . $category->slug;
                                        }
                                    }
                                    ?>
                                    <div class="col-md-4 mt-3 mix<?php echo $category_classes; ?>">
                                        <a href="<?php echo $link; ?>">
                                            <div class="boxAll">
                                                <div class="imagemCase">
                                                    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>"
                                                        class="img-fluid">
                                                </div>
                                                <div class="boxInfo">
                                                    <div class="titulo">
                                                        <h1>
                                                            <?php echo the_title(); ?>
                                                        </h1>
                                                    </div>
                                                    <div class="resumo">
                                                        <p>
                                                            <?php echo $excerpt; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
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
</main>

<?php get_footer(); ?>