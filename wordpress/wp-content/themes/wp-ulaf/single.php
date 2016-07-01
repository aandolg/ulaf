<?php get_header(); ?>

  <section class="section-history">
     <div class="container">
        <div class="row">

          <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-xs-12'); ?>>

              <h1 class="page-title"><?php the_title(); ?></h1>
              <?php the_content(); ?>

              <?php get_template_part('relative-pages'); ?>

              <span class="date"><?php the_time('d F Y'); ?> <?php the_time('H:i'); ?></span>

              <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'wpeasy' ), __( '1 Comment', 'wpeasy' ), __( '% Comments', 'wpeasy' )); ?></span>

              <span class="tags"><?php the_tags( __( 'Tags: ', 'wpeasy' ), ', ', '<br>'); ?></span>
              <span class="category"><?php _e( 'Categorised in: ', 'wpeasy' ); the_category(', '); ?></span>
              <span class="post"><?php _e( 'This post was written by ', 'wpeasy' ); the_author(); ?></span>

            </article>

          <?php endwhile; else: // If 404 page error ?>

            <article class="col-md-12">

              <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>

            </article>

          <?php endif; ?>

          <div class="col-md-12 section-comments">
            <?php comments_template(); ?>
          </div><!-- /.col-md-12 section-comments -->

      </div><!-- row -->
    </div><!-- container -->
  </section><!-- section-history -->

<?php get_footer(); ?>
