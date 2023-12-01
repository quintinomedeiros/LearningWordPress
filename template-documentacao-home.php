<?php
/*
Template Name: Template Documentação - Home
*/

get_header(); // Inclui o cabeçalho do tema
?>
    <!-- Conteúdo Principal -->
    <div class="content-inicial">
        <?php
        $categories = get_categories(array('exclude' => 1)); // Exclui a categoria "Sem categoria"
        foreach ($categories as $category) {
            echo '<div class="category-card">';
            echo '<h2>' . $category->name . '</h2>';

            // Lista de subcategorias e links para posts
            $args_subcategories = array(
                'child_of' => $category->term_id,
                'hide_empty' => false,
            );
            $subcategories = get_categories($args_subcategories);

            if (!empty($subcategories)) {
                echo '<ul>';
                foreach ($subcategories as $subcategory) {
                    echo '<li>';
                    echo '<h3>' . $subcategory->name . '</h3>';

                    // Lista ordenada de links para posts da subcategoria atual
                    $args_posts_subcategory = array(
                        'category' => $subcategory->term_id,
                    );
                    $posts_subcategory = get_posts($args_posts_subcategory);

                    if (!empty($posts_subcategory)) {
                        echo '<ul>';
                        foreach ($posts_subcategory as $post) {
                            echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                // Se não houver subcategorias, exibe links para posts da categoria atual
                $args_posts = array(
                    'category' => $category->term_id,
                );
                $posts = get_posts($args_posts);

                if (!empty($posts)) {
                    echo '<ul>';
                    foreach ($posts as $post) {
                        echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
                    }
                    echo '</ul>';
                }
            }

            echo '</div>';
        }
        ?>
    </div>

<?php get_footer(); // Inclui o rodapé do tema ?>
