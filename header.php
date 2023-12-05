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
                // Obter todas as categorias pai
                $categories = get_categories(array('parent' => 0));

                // Loop através de cada categoria pai
                foreach ($categories as $category) {
                    echo '<li class="menu-item-has-children">';
                    echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . ' &#8661;</a>';

                    // Obter os posts da categoria pai
                    $posts = get_posts(array('category' => $category->term_id));

                    if ($posts) {
                        echo '<ul class="sub-menu">';
                        foreach ($posts as $post) {
                            echo '<li><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
                        }
                        echo '</ul>';
                    }

                    echo '</li>';
                }
                ?>
            </ul>
        </div>


