        
                </div>
            </div>
        </main>
        <!-- /Conteúdo principal -->

        <!-- Rodapé -->
        <footer class="site-footer">
            <div class="footer-content">
            <div class="footer-redes-cefor">
                    <h4>Cefor nas Redes Sociais</h4>
                    <a href="https://www.facebook.com/escoladacamaradeputados"><img src="https://www.camara.leg.br/tema/assets/images/icone-circulo-facebook-40px.png" alt="Ícone do Facebook"></a>
                    <a href="https://www.youtube.com/escoladacamara"><img src="https://www.camara.leg.br/tema/assets/images/icone-circulo-youtube-40px.png" alt="Ícone do Youtube"></a>
                    <a href="https://www.instagram.com/escoladacamara/"><img src="https://www.camara.leg.br/tema/assets/images/icone-circulo-instagram-40px.png" alt="Ícone do instrgram"></a>
                </div>
                <div class="footer-endereco">
                    <p><strong>57ª Legislatura - 1ª Sessão Legislativa Ordinária</strong></p>
                    <p><strong>Telefone:</strong> (61) 3216-0000 | <strong>Disque-Câmara:</strong> 0800-0-619-619</p>
                    <p>Câmara dos Deputados - Palácio do Congresso Nacional - Praça dos Três Poderes - Brasília - DF - CEP 70160-900</p>
                </div>
                <div class="footer-nav-div">
                    <nav class="site-nav">
                        <?php 
                            $args = array(
                                'theme_location' => 'footer-menu'
                            )
                        ?>
                        <?php wp_nav_menu( $args ); ?>
                        
                    </nav>
                </div>
            </div>
            <p class="footer-direitos">
                <span>CEFOR - Centro de Formação, Treinamento e Aperfeiçoamento da Câmara dos Deputados</span><br>
                <span>COTEC - Coordenação de Tecnologias Educacionais e Comunicação</span><br>
                <span><?php bloginfo('name'); ?> &copy - <?php echo date("Y");?></span>
            </p>
        </footer>
        <!-- /Rodapé -->

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var menuToggle = document.querySelector('.menu-toggle');
                var categoryMenu = document.querySelector('.sidebar .category-menu');
                var subMenus = document.querySelectorAll('.sidebar .category-menu .sub-menu');

                menuToggle.addEventListener('click', function () {
                    categoryMenu.classList.toggle('active');
                });

                subMenus.forEach(function (subMenu) {
                    subMenu.style.display = 'none';
                });

                document.querySelectorAll('.sidebar .category-menu .menu-item-has-children > a').forEach(function (link) {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        var subMenu = this.nextElementSibling;
                        subMenu.style.display = subMenu.style.display === 'none' ? 'block' : 'none';
                    });
                });
            });
        </script>

    <?php wp_footer(); ?>
</body>
</html>