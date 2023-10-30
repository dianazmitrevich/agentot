<?php
/*
    Template Name: Страница услуги
    Template Post Type: services
*/
?>

<?php get_header(); ?>

<main class="g-main">
    <div class="breadcrumbs">
        <div class="breadcrumbs__wrapper container">
            <div class="breadcrumbs__items">
                <div class="breadcrumbs__item"><a href="<?php echo bloginfo('url');?>">Главная</a></div>
                <div class="breadcrumbs__item"><a href="<?php echo bloginfo('url');?>/services">Услуги</a></div>
                <div class="breadcrumbs__item breadcrumbs__item-marked"><?php the_title(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-service service">
        <div class="service__wrapper container">
            <div class="service__title h2"><?php the_title(); ?></div>
            <div class="service__subtitle"><?php echo the_field('service_sm_description'); ?></div>
            <div class="service__row">
                <div class="sticky-wrap">
                    <div class="service__col service__col-contents contents">
                        <div class="contents__title col-title">Содержание</div>
                        <div class="contents__items">
                            <ul>
                                <?php for($i = 1; $i <= 5; $i++) {
                                    $field_name = 'service_contents_' . $i;
                                    if (get_field($field_name)[$field_name . '_name'] && get_field($field_name)[$field_name . '_text']) {
                                ?>
                                <li><a href="#anchor-<?php echo $i; ?>"><?php echo get_field($field_name)[$field_name . '_name']; ?></a></li>
                                <?php }} ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="service__col service__col-text text">
                    <div class="text-wrap">
                        <?php for($i = 1; $i <= 5; $i++) {
                            $field_name = 'service_contents_' . $i;
                            if (get_field($field_name)[$field_name . '_name'] && get_field($field_name)[$field_name . '_text']) {
                        ?>
                        <div class="text__item">
                            <div class="text__item-anchor" id="anchor-<?php echo $i; ?>"></div>
                            <div class="text__item-title col-title"><?php echo get_field($field_name)[$field_name . '_name']; ?>:</div>
                            <div class="text__item-info">
                                <?php echo get_field($field_name)[$field_name . '_text']; ?>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                    <?php if(get_field('service_employee')) { ?>
                    <div class="text-wrap">
                        <div class="text__employee employee">
                            <div class="employee__title col-title">Ответственный за услугу</div>
                            <div class="employee__image"><img src="<?php echo wp_get_attachment_image_url(get_post_meta(get_field('service_employee'))['employee_image'][0]); ?>" alt="Сотрудник"></div>
                            <div class="employee__info">
                                <div class="info-wrap">
                                    <div class="employee__position"><?php echo get_post_meta(get_field('service_employee'))['employee_position'][0]; ?></div>
                                    <div class="employee__title"><?php echo get_post(get_field('service_employee'))->post_title; ?></div>
                                </div>
                                <div class="employee__contacts">
                                    <a href=""><?php echo get_post_meta(get_field('service_employee'))['employee_phone'][0]; ?></a>
                                    <a href=""><?php echo get_post_meta(get_field('service_employee'))['employee_mail'][0]; ?></a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="block-form form">
        <div class="form__wrapper">
            <div class="container">
                <div class="form__title h2">Заказать услугу</div>
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
    <div class="other-services services">
        <div class="services__wrapper">
            <div class="title-wrap container">
                <div class="services__title h2">Другие услуги</div>
                <div class="main-tr-btn">Просмотреть все</div>
            </div>
            <div class="services__cards services__cards-slider">
                <?php
                    $services_cards = get_posts(array(
                        'numberposts' => -1,
                        'orderby' => 'date',
                        'post_type' => 'service',
                        'suppress_filters' => true,
                    ));

                    // echo '<pre>';
                    // print_r($services_cards);
                    // echo '</pre>';
                    foreach ($services_cards as $item) {
                        setup_postdata($item);

                        if ($item->ID == $post->ID) { continue; } else {
                ?>
                <div class="services__card card"><a href="<?php echo get_permalink($item->ID); ?>"></a>
                    <div class="text-wrap">
                        <div class="card__title"><?php echo $item->post_name; ?></div>
                        <div class="card__text"><?php the_field('service_sm_description', $item->ID); ?></div>
                    </div>
                    <div class="card__btn">Подробнее</div>
                </div>
                <?php
                    }}
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>