<?php
/*
  Template Name: Formations
  Template Post Type: page
*/
get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
            <h2 style="text-align: center;">Toutes nos formations</h2>
        
        <?php 
        $arg = array(
            'post_type' => 'Formation',
            'posts_per_page' => 15
            );
        $formation_query = new WP_Query( $arg );
        
        if ( $formation_query->have_posts() ) : 
        ?>
        <?php while( $formation_query->have_posts() ) : $formation_query->the_post() ?>
            <div class="formation-thumb"><?php the_post_thumbnail(); ?></div>
             <div class="formation-blog-content">
                <h3 class="blog-formation-title"><?php the_title(); ?></h3>
                <p>Date prévisionnelle : <?php the_date(F-Y); ?></p>
                <div><?php the_content(); ?></div>
                </div>
    	<?php endwhile ?>
       <?php endif ?>

        </div><!-- #content --> 
    </div><!-- #primary -->

<?php get_footer(); ?>