<?php
/*
Template Name: Template Documentação - Página
*/
?>

<div class="conteudo-posts">
    <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
            <article class="post page">
                <h2><?php the_title(); ?></h2>

                <?php
                    $args = array(
                        'child_of' => $post->ID
                    );
                ?>

                <?php wp_list_pages($args); ?>

                <p><?php the_content(); ?></p>
            </article>
            
            <?php endwhile;

        else:
            echo '<p>Nenhum conteúdo encontrado!</p>';

        endif;
    ?>
</div>