
<?php /* Template Name: friends and sponsors */ get_header(); ?>
<section class="section-news category">
    <div class="container">
    <?php query_posts(array( 'post_type' => 'friends','showposts' => 100 ) ); ?>
      <?php while (have_posts()) : the_post(); ?>
      <div class="row category-news">



        <div class="col-md-12 single-post">
        <div class="col-md-4 single-post">
          <?php if ( has_post_thumbnail()) :?>
            <a href="<?php the_permalink() ?>"><?php the_title(); ?>
            <?php the_post_thumbnail('medium'); ?></a>
          <?php endif; ?><!-- /post thumbnail --></div>
          <div class="col-md-8 single-post">

              <p><?php the_content(); ?></p>
              <p><?php the_excerpt(); ?></p>

            </div>
        </div>

      </div><!-- row -->
      <?php endwhile;?>
        <?php wp_reset_query(); ?>
    </div><!-- container -->
  </section><!-- section-news -->

<?php get_footer(); ?>
