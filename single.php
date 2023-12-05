<?php
get_header(); // Inclui o cabeçalho do tema
?>

<div class="conteudo-posts">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article class="post page">
                <?php
                $post_category = get_the_category();
                $post_category_name = $post_category[0]->name; // Assumindo que o post pertence a apenas uma categoria
                ?>

                <h2><?php single_cat_title(); ?></h2>

                <?php
                $args = array(
                    'category_name' => $post_category_name,
                    'name' => $wp_query->query_vars['name']
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        // Exibe o conteúdo do post associado à categoria
                        ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_content(); ?></p>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum conteúdo encontrado!</p>';
                endif;
                ?>
            </article>
        <?php endwhile;

    else :
        echo '<p>Nenhum conteúdo encontrado!</p>';

    endif;
    ?>
</div>

<?php get_footer(); // Inclui o rodapé do tema ?>
