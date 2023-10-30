<?php
/*
    Template Name: Главная
*/
?>

<?php get_header(); ?>

<main class="g-main">
    <?php do_shortcode('[area id="73"]'); ?>
    <?php do_shortcode('[area id="74"]'); ?>
    <div class="block-services services">
        <div class="services__wrapper container">
            <div class="services__title h2">Услуги</div>
            <div class="services__cards">
                <?php
                    $services_cards = get_posts(array(
                        'numberposts' => -1,
                        'orderby' => 'date',
                        'post_type' => 'service',
                        'suppress_filters' => true,
                    ));
                    foreach ($services_cards as $item) {
                        setup_postdata($item);
                ?>
                <div class="services__card card"><a href="<?php echo get_permalink($item->ID); ?>"></a>
                    <div class="text-wrap">
                        <div class="card__title"><?php echo $item->post_name; ?></div>
                        <div class="card__text"><?php the_field('service_sm_description', $item->ID); ?></div>
                    </div>
                    <div class="card__btn">Подробнее</div>
                </div>
                <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>
            <div class="services__btn main-btn">Все услуги</div>
        </div>
    </div>
    <?php do_shortcode('[area id="104"]'); ?>
    <div class="main-team team">
        <div class="team__wrapper">
            <div class="title-wrap container">
                <div class="team__title h2">Сотрудники</div>
                <div class="main-tr-btn">Все сотрудники</div>
            </div>
            <div class="slider-wrap container">
                <?php
                    $employees_cards = get_posts(array(
                        'numberposts' => -1,
                        'orderby' => 'date',
                        'post_type' => 'employees',
                        'suppress_filters' => true,
                    ));
                    foreach ($employees_cards as $item) {
                        setup_postdata($item);

                        if (get_field('employee_featured', $item->ID)) {
                ?>
                <div class="team__featured">
                    <div class="team__featured-image"><img src="<?php the_field('employee_image', $item->ID); ?>" alt="Сотрудник"></div>
                    <div class="team__featured-title"><?php echo $item->post_title; ?></div>
                    <div class="team__featured-subtitle"><?php the_field('employee_position', $item->ID); ?></div>
                </div>
                <?php
                    }}
                    wp_reset_postdata();
                ?>
                <div class="team__slider slider">
                    <?php
                        $employees_cards = get_posts(array(
                            'numberposts' => -1,
                            'orderby' => 'date',
                            'post_type' => 'employees',
                            'suppress_filters' => true,
                        ));
                        
                        foreach ($employees_cards as $item) {
                            setup_postdata($item);
                    ?>
                    <div class="slider__item">
                        <div class="slider__item-image"><img src="<?php the_field('employee_image', $item->ID); ?>" alt="Сотрудник"></div>
                        <div class="slider__item-title"><?php the_field('employee_position', $item->ID); ?></div>
                        <div class="slider__item-subtitle"><?php echo $item->post_title; ?></div>
                    </div>
                    <?php
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php do_shortcode('[area id="106"]'); ?>
    <div class="main-clients clients">
        <div class="clients__wrapper container">
            <div class="clients__title h2">Клиенты</div>
            <div class="clients__slider slider">
                <?php
                    $clients_cards = get_posts(array(
                        'numberposts' => -1,
                        'orderby' => 'date',
                        'post_type' => 'client',
                        'suppress_filters' => true,
                    ));
                    foreach ($clients_cards as $item) {
                        setup_postdata($item);
                ?>
                <div class="slider__item">
                    <img src="<?php the_field('client_image', $item->ID); ?>" alt="Клиент">
                </div>
                <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="block-form form">
        <div class="form__wrapper">
            <div class="container">
                <div class="form__title h2">Заполните форму и мы свяжемся с вами!</div>
                <?php echo do_shortcode('[contact-form-7 id="9c335cd" title="Контактная форма 1"]'); ?>
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
</main>

<?php get_footer(); ?>