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
                _e("<h1>Résultat de la recherche</h1><h2>Élément recherché: « ".get_query_var('s')." »</h2>");
                while ( $the_query->have_posts() ) {
                    $the_query->the_post() ;?>
                        <article class="post__recherche">
                            <h2><a href="<?php the_permalink(); ?>"><?= get_the_title(); ?></a></h2>
                            <?php echo "<p>".wp_trim_words(get_the_excerpt(), 18, ""); ?>
                            <a href="<?php the_permalink(); ?>">&#8608;</a></p>
                        </article> <?php 
                }
                echo '<p>'.$wp_query->found_posts.' résulats.</p>';
            } else { ?>
                <h1>Aucun article trouvé</h1>
                <div class="alert alert-info">
                    <p>Désolé, aucun article contient ne contient « <?= get_query_var('s') ;?> ». Veuillez essayer une autre recherche.</p>
                </div>
            <?php } ?>
        </section>
    </main>
</body>
</html>

<?php
get_footer();