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
        <nav class="menu_evenement">
            <h2>Les évènements à venir</h2>
            <?php
			// affichage du menu evenement
			wp_nav_menu(array(
                "menu" => "evenement",
            )); ?>
        </nav>
        <section class="grille">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article class="main__post <?php if(has_category("galerie")){ echo "grille_categorie"; };?>">
                        <?php if(has_category("galerie")){ ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_content();
                        } else { ?>
                            <h2><a href="<?php the_permalink(); ?>"><?= substr(explode("(", get_the_title())[0], 8); ?></a></h2>
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('thumbnail');
                            }; 
                            echo
                            "<h3>Durée du cours: ".get_field('duree')."</h3>".
                            "<p>".wp_trim_words(get_the_excerpt(), 18, "...")."</p>";
                        };?>
                    </article>
                    <?php endwhile;
            endif;
            ?>
        </section>
    </main>
</body>
</html>

<?php
get_footer();