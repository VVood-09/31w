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

<body>
    <main class="site__main">
        <section>
            <!-- https://stackoverflow.com/questions/14802498/how-to-display-wordpress-search-results
                 pour la gestion de la recherche -->
            <?php
            $s=get_search_query();
            $args = array('s' =>$s);
                // The Query
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                _e("<h1>Résultat de la recherche</h1><h2>Élément de recherche: « ".get_query_var('s')." »</h2>");
                while ( $the_query->have_posts() ) {
                    $the_query->the_post() ;?>
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
                        </article> <?php 
                }
            } else { ?>
                <h1>Aucun article trouvé</h1>
                <div class="alert alert-info">
                    <p>Désolé, aucun article contient ne contient « "<?php get_query_var('s') ;?> ». Veuillez essayer une autre recherche.</p>
                </div>
            <?php } ?>
        </section>
    </main>
</body>
</html>

<?php
get_footer();