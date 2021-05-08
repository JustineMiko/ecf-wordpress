<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <article class="team">
      <h2 class="title">
        <?php the_title(); ?>
      </h2>
      <div class="content">
        <?php the_content(); ?>
      </div>
      <div>
          <button class="button">Retour</button>
      </div>
    </article>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>