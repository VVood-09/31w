<?php
/**
* Template Name: Evenement
*
* @package WordPress
* @subpackage igc_31w
*/
?>
 
<?php get_header() ?>
<main>
 
    <!-- <h1>---- Template Evenement ------</h1> -->
   <?php if (have_posts()): the_post(); ?>
        <h2><?php the_title() ?></h2>
        <p></p><?php the_content() ?></p>
        <p>Venez nous joindre au <?= the_field('adresse'); ?></p>        
        <p>Le <?= the_field('date'); ?></p>        
   <?php endif ?>
</main>
<?php get_footer() ?>