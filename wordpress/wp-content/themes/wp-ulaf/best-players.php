<?php /* Template Name: Champioship Page */ get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <div class="row">
    <div class="col-md-12">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h1 class="page-title inner-title"><?php the_title(); ?></h1>
        <table class="best-players">
          <tr class="mvp-player-photo">
            <td><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></td>
            <td><img src="<?php echo get_template_directory_uri(); ?>/img/bogach.jpg"></td>
            <td><img src="<?php echo get_template_directory_uri(); ?>/img/dzyganskii.jpg"></td>
            <td><img src="<?php echo get_template_directory_uri(); ?>/img/koss.jpg"></td>
            <td><img src="<?php echo get_template_directory_uri(); ?>/img/peregon.jpg"></td>
            <td><img src="<?php echo get_template_directory_uri(); ?>/img/tackov.jpg"></td>
          </tr>
          <tr>
            <td>Набраных ярдов(Бег)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Набраных ярдов(Пас)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Приемов</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Дропов</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Тачдаунов</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr><tr>
            <td>Фамблов</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>

        <?php the_content(); ?>
        <?php edit_post_link(); ?>

      </article>
    </div>
  </div><!-- row -->
  <?php endwhile; else: // If 404 page error ?>
    <div class="row">
      <div class="col-md-12">
        <article>
          <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
        </article>
      </div>
    </div><!-- row -->
  <?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
