<?php
/*
Template Name: Contato
*/
get_header();
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
                            <a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="formContato">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto boxFormCustom">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titulo">
                                <h1>
                                    <?php the_field('titulo_formulario'); ?>
                                </h1>
                            </div>
                            <div class="subtitulo">
                                <p>
                                    <?php the_field('subtitulo_formulario'); ?>
                                </p>
                            </div>
                            <div class="boxPlugin">
                                <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário de contato"]'); ?>
                            </div>
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="boxContact">
                                <ul>
                                    <?php
                                    $contatos = get_field('contatos');
                                    foreach ($contatos as $contatos_form) { ?>
                                        <li class="d-flex align-items-center gap-3">
                                            <div class="icone">
                                                <?php echo $contatos_form['icone_contato']; ?>
                                            </div>
                                            <div class="link">
                                                <a href="<?php echo $contatos_form['link_de_contato']['url']; ?>" target="_blank">
                                                    <?php echo $contatos_form['link_de_contato']['title']; ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>