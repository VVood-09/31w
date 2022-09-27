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
<h1 class="trace">single.php</h1>
<?php get_header(); ?>

<body>
    <main>
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_title('<h2>', '</h2>');
                the_content(null, true); ?>

                <p><?php the_weekday(); ?> <?php the_date(); ?> <?php the_time(); ?>.</p>
                <p><?php the_author(); ?></p>
                <p><?php the_category(); ?></p>
            <?php endwhile;
        endif;
            ?>
    </main>
</body>

</html>

<?php
get_footer();
