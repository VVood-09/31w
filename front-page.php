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
    <main class="site__main">
        <?php
			// affichage du menu evenement
			wp_nav_menu(array(
				"menu" => "evenement",
				"container" => "nav",
				"container_class" => "menu_evenement"
		)); ?>
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="main__post">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_content(null, true); ?>
                    </article>
                <?php endwhile;
            endif;
        ?>
    </main>
</body>
</html>

<?php
get_footer();