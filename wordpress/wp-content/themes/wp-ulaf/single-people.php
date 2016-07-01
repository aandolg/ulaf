<?php get_header(); ?>
<section class="container container-content">
  <div class="row">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
        <div class="row player-card">
          <div class="player-main-photo col-md-6">
            <?php if ( has_post_thumbnail()) :?>
              <a class="single-thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail(); // Fullsize image for the single post ?>
              </a>
            <?php endif; ?><!-- /post thumbnail -->
          </div><!-- /.player-main-photo -->
          <div class="col-md-6 player-character"><!-- player-character  -->
            <ul class="description people">
                  <li><?php the_title(); ?></li>
                  <li>КОМАНДА :</li>
                  <li>ГОД РОЖДЕНИЯ :</li>
                  <li>ПРИБЫЛ С :</li>
                  <li>В КОМАНДЕ С : </li>
                  <li>ПРЕДЫДУЩИЕ КОМАНДЫ : </li>
           </ul>
          </div><!--/ player-character -->
        </div><!-- /.row -->
    <div class="row">
    <div class="col-md-12 player-bio poeple">
            <?php the_content(); ?>
          </div><!-- /.col-md-9 player-bio -->
      </div><!-- /row -->

      <?php the_tags( __( 'Tags: ', 'wpeasy' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

    <div class="owl-people-slide">
      <?php  $images = get_field('people_gallery');
              if( $images ):
     foreach( $images as $image ): ?>
        <div class="item-slide">
          <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
                <?php endforeach; ?>
                <?php endif; ?>
    </div>
      <?php comments_template(); ?>
</article>
  <?php endwhile; else: ?>
    <article class="col-md-12">
      <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
    </article>
  <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
