<?php
/*
    Template Name: Контакты
*/
?>

<?php get_header(); ?>

<main class="g-main">
    <div class="breadcrumbs">
        <div class="breadcrumbs__wrapper container">
            <div class="breadcrumbs__items">
                <div class="breadcrumbs__item"><a href="index.html">Главная</a></div>
                <div class="breadcrumbs__item breadcrumbs__item-marked"><a href="services.html">Контакты</a>
                </div>
            </div>
        </div>
    </div>
    <div class="block-contacts contacts">
        <div class="contacts__wrapper container">
            <div class="title-wrap">
                <div class="contacts__title h2">Контакты</div>
                <div class="main-tr-btn">Все контакты</div>
            </div>
            <div class="contacts__cards">
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
                <div class="contacts__card card">
                    <div class="card__title">
                        <a href="<?php echo get_field('contact_service', $item->ID)->guid; ?>"><?php echo $item->post_name; ?></a>
                    </div>
                    <div class="card__text">
                        <p><a href="tel:"><?php the_field('contact_phone', $item->ID); ?></a></p>
                        <p><a href="mailto:"><?php the_field('contact_mail', $item->ID); ?></a></p>
                    </div>
                </div>
                <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>
            <?php do_shortcode('[area id="108"]'); ?>
            <div class="contacts__map"><iframe
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A4e0c36e5e291cdfbe06669b507d0b8092ec6d0dc2a1fa44236dc73cc81485a82&amp;source=constructor"
                    width="100%" height="100%" frameborder="0"></iframe><a class="contacts__route main-btn"
                    href="https://yandex.ru/maps/?rtext=~53.710601,23.825558">Проложить маршрут</a></div>
        </div>
    </div>
    <div class="block-form form">
        <div class="form__wrapper">
            <div class="container">
                <div class="form__title h2">Заполните форму и мы свяжемся с вами!</div>
                <div class="form__items">
                    <div class="form__item"><input type="text" name="" placeholder="Фамилия Имя Отчество">
                    </div>
                    <div class="form__item"><input type="tel" name="" placeholder="+375 (29) 111–22–33">
                    </div>
                    <div class="form__item"><input type="email" name="" placeholder="agentot@gmail.com">
                    </div>
                    <div class="form__item"><input type="text" name="" placeholder="Оставьте своё сообщение"></div>
                    <div class="form__btn"><button class="main-btn" type="submit">Отправить</button></div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>