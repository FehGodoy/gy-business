<?php

get_header();
$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
$post_date = get_the_date('d/m/Y');
$categories = get_the_category();
$category_ids = array();
foreach ($categories as $category) {
    $category_ids[] = $category->term_id;
}

$related_args = array(
    'post_type' => 'projects',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__not_in' => array(get_the_ID()),
    'category__in' => $category_ids,
    'orderby' => 'date',
    'order' => 'DESC'
);


$related_posts = get_posts($related_args);
?>


<main>
    <section class="pageTitle">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <h1>
                        <?php echo the_title(); ?>
                    </h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="<?php echo site_url(); ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url(); ?>/projects">Projects</a>
                        </li>
                        <li>
                            <a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="produtoSingle mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="boxImagem">
                        <img src="<?php echo $thumbnail_url; ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxInfo">
                        <div class="data mt-4">
                            <span>
                                <?php echo $post_date; ?>
                            </span>
                        </div>
                        <div class="titulo">
                            <h1>
                                <?php echo the_title(); ?>
                            </h1>
                        </div>
                        <!-- Exibe as categorias -->
                        <?php if (!empty($categories)): ?>
                            <div class="categorias">
                                <p>Tipo:
                                    <?php foreach ($categories as $category): ?>
                                        <?php echo $category->name; ?>
                                        <?php if ($category !== end($categories))
                                            echo ', '; ?>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="descricao">
                            <?php echo the_content(); ?>
                        </div>
                        <div class="linkBotao">
                            <?php
                            $link_projeto = get_field('link_projeto'); ?>                            
                            <a href="<?php echo $link_projeto['url']; ?>" target="<?php echo $link_projeto['target']; ?>"
                                rel="noopener noreferrer">
                                Link do Projeto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relacionados mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cases relacionados</h1>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="boxCarousel">
                        <div class="owl-carousel owl-theme">

                            <?php
                            foreach ($related_posts as $related) {
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($related), 'full')[0];
                                $title = get_the_title($related);
                                $excerpt = get_the_excerpt($related);
                                $link = get_permalink($related);
                                ?>
                                <div class="boxAll">
                                    <a href="<?php echo $link; ?>">
                                        <div class="imagemCase">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>"
                                                class="img-fluid">
                                        </div>
                                        <div class="boxInfo">
                                            <div class="titulo">
                                                <h1>
                                                    <?php echo $title; ?>
                                                </h1>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>