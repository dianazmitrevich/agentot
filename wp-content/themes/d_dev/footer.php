            <footer class="footer">
                <div class="footer__wrapper">
                    <div class="container">
                        <div class="footer__row">
                            <div class="footer__col footer__col-nav">
                                <div class="logo-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Agentot">
                                    <?php do_shortcode('[area id="109"]'); ?>
                                </div>
                                <?php
                                wp_nav_menu([
                                    'menu' => 'Главное меню – Футер',
                                    'menu_class' => 'footer__nav',
                                ]);
                                ?>
                            </div>
                            <?php do_shortcode('[area id="110"]'); ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/main.js"> </script>
    <?php wp_footer(); ?>
</body>

</html>