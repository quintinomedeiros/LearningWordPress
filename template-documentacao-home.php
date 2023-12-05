<?php
/*
Template Name: Template Documentação - Home
*/

get_header(); // Inclui o cabeçalho do tema
?>
    <!-- Conteúdo Principal -->
    <div class="content-inicial">
                <?php
        $categories = get_categories(array('exclude' => 1, 'parent' => 0)); // Exclui a categoria "Sem categoria" e obtém apenas categorias de nível superior
        foreach ($categories as $category) {
            echo '<div class="category-card">';
            echo '<h2>' . $category->name . '</h2>';

            // Obtém os posts associados a cada categoria
            $args = array(
                'cat' => $category->cat_ID,
                'posts_per_page' => -1 // Para obter todos os posts associados à categoria
            );
            $posts = get_posts($args);

            // Exibe os links dos posts
            if ($posts) {
                echo '<ul>';
                foreach ($posts as $post) {
                    echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Nenhum post encontrado para esta categoria.</p>';
            }

            echo '</div>';
        }
        ?>
    </div>
<?php get_footer(); // Inclui o rodapé do tema ?>
