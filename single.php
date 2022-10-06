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
<h1 class="trace">single.php</h1>

<body>
    <main>
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_title('<h2>', '</h2>');
                the_content(null, true); ?>

                <p>Écrit le <?php the_weekday(); ?> <?php the_date(); ?> à <?php the_time(); ?>.</p>
                <p>Par <?php the_author(); ?> <br><small>Catégorie : <?php the_category(); ?></small></p>
            <?php endwhile;
        endif;
            ?>
    </main>
</body>

</html>

<?php
get_footer();
