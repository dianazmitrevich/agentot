<?php
/*
    Template Name: Сотрудники
*/
?>

<?php get_header(); ?>

<main class="g-main">
    <div class="breadcrumbs">
        <div class="breadcrumbs__wrapper container">
            <div class="breadcrumbs__items">
                <div class="breadcrumbs__item"><a href="index.html">Главная</a></div>
                <div class="breadcrumbs__item breadcrumbs__item-marked"><a href="services.html">Сотрудники</a></div>
            </div>
        </div>
    </div>
    <div class="page-team team">
        <div class="team__wrapper container">
            <div class="team__title h2">Сотрудники</div>
            <div class="team__cards">
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
                <div class="team__card card <?php if (get_field('employee_featured', $item->ID)) { echo 'team__card-featured'; } ?>">
                    <div class="card__image"><img src="<?php the_field('employee_image', $item->ID); ?>" alt="Сотрудник"></div>
                    <div class="card__info">
                        <div class="card__position"><?php the_field('employee_position', $item->ID); ?></div>
                        <div class="card__title"><?php echo $item->post_title; ?></div>
                        <div class="card__contact"><a href=""><?php the_field('employee_phone', $item->ID); ?></a><a href=""><?php the_field('employee_mail', $item->ID); ?></a></div>
                    </div>
                    <div class="card__services">
                    <?php
                        foreach(get_field('employee_services', $item->ID) as $id) {
                            echo '<a href="' . get_post($id)->guid . '">' . get_post($id)->post_title . '</a>';
                        }
                    ?>
                    </div>
                </div>
                <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="container"></div>
</main>

<?php get_footer(); ?>