        
        </main>
        <!-- /Conteúdo principal -->

        <!-- Rodapé -->
        <footer class="site-footer">
        <nav class="site-nav">
            <?php 
                $args = array(
                    'theme_location' => 'footer-menu'
                )
            ?>
            <?php wp_nav_menu( $args ); ?>
        </nav>
            <p><?php bloginfo('name'); ?> &copy - <?php echo date("Y");?></p>
        </footer>
        <!-- /Rodapé -->

    <?php wp_footer(); ?>
</body>
</html>