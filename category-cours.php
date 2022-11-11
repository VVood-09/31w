<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */


?>
<?php get_header(); ?>
<!-- <h1 class="trace">front-page.php</h1> -->

<body>
    <main class="site__main category__cours">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <article class="main__post">
                    <h2><a href="<?php the_permalink(); ?>"><?= substr(explode("(", get_the_title())[0], 8); ?></a></h2>
                    <h3>Durée du cours: <?php the_field('duree'); ?></h3>
                    <?= "<p>".wp_trim_words(get_the_excerpt(), 30, "...")."</p>"; ?>
                </article>
        <?php endwhile;
        endif;
        ?>
    </main>
</body>

</html>

<?php
get_footer();
