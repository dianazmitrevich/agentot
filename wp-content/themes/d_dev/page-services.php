<?php
/*
    Template Name: Услуги
*/
?>

<?php get_header(); ?>

<main class="g-main">
    <div class="breadcrumbs">
        <div class="breadcrumbs__wrapper container">
            <div class="breadcrumbs__items">
                <div class="breadcrumbs__item"><a href="<?php echo bloginfo('url');?>">Главная</a></div>
                <div class="breadcrumbs__item breadcrumbs__item-marked">Услуги
                </div>
            </div>
        </div>
    </div>
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