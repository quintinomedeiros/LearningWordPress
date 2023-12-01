<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    
    <!-- Cabeçalho -->
    <header class="site-header">
        <div class="menu-links">
            <a class="logo-camara" href="https://www.camara.leg.br/"><img src="https://www.camara.leg.br/tema/assets/images/logo-brand-camara-desktop.png" alt=""></a>
            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <nav class="site-nav">
                <?php 
                    $args = array(
                        'theme_location' => 'header-menu'
                    )
                ?>
            <?php wp_nav_menu( $args ); ?>
        </nav>
        </div>

    </header>
    <!-- /Cabeçalho -->

    <!-- Conteúdo principal -->
    <main class="container">

        <div id="primary-inicial" class="content-area-inicial">

            <!-- Menu Lateral Responsivo -->
            <div class="sidebar">
                <div class="menu-toggle">&#9776;</div>
                <ul class="category-menu">
                    <?php
                        $args_menu_lateral = array(
                            'theme_location' => 'menu-lateral',
                            'container_class' => 'menu-lateral',
                        );

                        // Obtém os itens do menu
                        $menu_items = wp_get_nav_menu_items($args_menu_lateral['theme_location']);

                        // Verifica se há itens no menu antes de continuar
                        if ($menu_items) {
                            // Filtra os itens do menu para incluir subcategorias e links para posts
                            $filtered_menu_items = array_filter($menu_items, function ($item) {
                                // Adicione condições conforme necessário para filtrar os itens do menu
                                return $item->menu_item_parent == 0; // Exibir apenas itens de nível superior
                            });

                            // Exibe os itens do menu
                            foreach ($filtered_menu_items as $menu_item) {
                                echo '<li>';
                                echo '<span class="category-title">' . $menu_item->title . '</span>';
                            
                                // Obtém subcategorias
                                $subcategories = get_categories(array(
                                    'parent' => $menu_item->object_id,
                                ));
                            
                                // Exibe links para posts de subcategorias
                                if (!empty($subcategories)) {
                                    echo '<ul>';
                                    foreach ($subcategories as $subcategory) {
                                        echo '<li>';
                                        echo '<span class="subcategory-title">' . $subcategory->name . '</span>';
                            
                                        // Obtém posts da subcategoria
                                        $posts = get_posts(array(
                                            'category' => $subcategory->term_id,
                                        ));
                            
                                        // Exibe links para posts
                                        if (!empty($posts)) {
                                            echo '<ul>';
                                            foreach ($posts as $post) {
                                                echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
                                            }
                                            echo '</ul>';
                                        } else {
                                            echo '<p>Nenhum post encontrado para a subcategoria ' . $subcategory->name . '</p>';
                                        }
                            
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                } else {
                                    echo '<p>Nenhuma subcategoria encontrada para a categoria ' . $menu_item->title . '</p>';
                                }
                            
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
