<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Агентот</title>
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>
    <div class="g-wrap">
        <div class="outer-bg">
            <header class="header">
                <div class="container">
                    <div class="header__desktop">
                        <div class="desktop-wrap">
                            <div class="header__col header__col-sites sites">
                                <div class="sites__head">
                                    <a href="<?php echo bloginfo('url');?>">
                                        <div class="sites__logo">
                                            <div class="sites__logo-wrap">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Agentot">
                                            </div>
                                            <span>АГЕНТОТ</span>
                                        </div>
                                    </a>
                                    <div class="sites__arrow">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dropdown__arrow.svg" alt="Открыть">
                                    </div>
                                </div>
                                <a class="sites__item" href="">
                                    <div class="sites__logo">
                                        <div class="sites__logo-wrap">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sizzapad.svg" alt="Agentot">
                                        </div>
                                        <span>СИЗ-Запад</span>
                                    </div>
                                </a>
                            </div>
                            <div class="header__col header__col-nav">
                                <?php
                                wp_nav_menu([
                                    'menu' => 'Главное меню',
                                    'container_class' => 'header__nav',
                                    'depth' => 0,
                                    'walker' => new My_Walker_Nav_Menu()
                                ]);
                                ?>
                                <div class="header__contact">
                                    <div class="header__btn main-tr-btn header__btn-contact">Связаться с нами</div>
                                    <div class="header__popup popup">
                                        <div class="popup-wrap">
                                            <div class="container">
                                                <div class="popup__wrapper">
                                                    <div class="popup__close header__btn-contact">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact__close.svg" alt="Закрыть"></div>
                                                    <div class="popup__heading">Связаться с нами</div>
                                                    <div class="popup__items">
                                                        <?php
                                                            $contact_cards = get_posts(array(
                                                                'numberposts' => -1,
                                                                'orderby' => 'date',
                                                                'post_type' => 'contact',
                                                                'suppress_filters' => true,
                                                            ));
                                                            foreach ($contact_cards as $item) {
                                                                setup_postdata($item);
                                                        ?>
                                                        <div class="popup__item">
                                                            <div class="popup__title">
                                                                <a href="<?php echo get_field('contact_service', $item->ID)->guid; ?>"><?php echo $item->post_name; ?></a>
                                                                </div>
                                                            <div class="popup__text">
                                                                <p><a href="tel:"><?php the_field('contact_phone', $item->ID); ?></a></p>
                                                                <p><a
                                                                        href="mailto:agentot@gmail.com"><?php the_field('contact_mail', $item->ID); ?></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                            }
                                                            wp_reset_postdata();
                                                        ?>
                                                    </div>
                                                    <div class="popup__btns">
                                                        <div class="popup__col">
                                                            <div class="main-btn">Заказать звонок</div>
                                                        </div>
                                                        <div class="popup__col">
                                                            <div class="main-tr-btn">Все контакты</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php wp_head(); ?>
            </header>