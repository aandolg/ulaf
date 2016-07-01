<?php /* Template Name: Gallery page */ get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="section content">
      <div class="container">
        <div class="row">

        <!-- Gallery Page -->
          <div class="col-md-12 gallery">
            <p><?php the_content(); ?></p>
              <?php $images = get_field('gallery'); if( $images ): ?>
            <ul>
              <?php foreach( $images as $image ): ?>
              <li>
                <a href="<?php echo $image['url']; ?>">
                  <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
                <p><?php echo $image['caption']; ?></p>
              </li>
                <?php endforeach; ?>
          </ul>
        <?php endif; ?>
          </div> <!-- gallery -->
        </div>
      </div>
    </div>
    </article>
  <?php endwhile; else: // If 404 page error ?>
    <article>

    </article>
  <?php endif; ?>
<?php get_footer(); ?>
