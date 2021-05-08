<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <article class="formation">
      <h2 class="title formation-single-title">
        <?php the_title(); ?>
      </h2>
      <h3>Date prévisionnelle : 
        <time datetime="<?php echo get_the_date('C'); ?>" itemprop="datePublished"><?php echo get_the_date('M Y'); ?></time>
      </h3>
      <div class="content">
        <?php the_content(); ?>
      </div>
      <div>
        <div class="group-button">
            <a href="http://www.sail.justine-mikolajczak.com/formations/">
                <i class="back-button fas fa-arrow-alt-circle-left"></i>
            </a>
            <div class="private-content-button">
                <a href="#" style="color: white;">Participer</a>
            </div>
        </div>
      </div>
    </article>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>