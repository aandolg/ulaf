<?php /* Template Name: Champioship Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="page-title inner-title"><?php the_title(); ?></h1>

    <div class="container game-info">
      <h2>Дивизион B</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              15.05
            </div>
            <a href="http://ulaf.pp.ua/games/monra">
            <div class="col-md-4 team-game">
              <span>Волки (Винница)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/wolves.png">
            </div>
            <div class="col-md-2 game-score">
              <span>98-13</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/mon.png">
              <span>Монархи (Ровно)</span>
            </div>
      </div><!-- row championship -->
        </a>
    </div>


    <div class="container game-info">
      <h2>Дивизион B</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              15.05
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Орлы (Здолбунов)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/eagles.png">
            </div>
            <div class="col-md-2 game-score">
              <span>24-0</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/.png">
              <span>Джокеры (Киев)</span>
            </div>
      </div><!-- row championship -->
        </a>
    </div>

    <div class="container game-info">
      <h2>Дивизион А</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              14.05
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Атланты (Харьков)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/atlants.png">
            </div>
            <div class="col-md-2 game-score">
              <span>28-41</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/.png">
              <span>Зубры (Минск)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
      <h2>Дивизион C</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              08.05
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Ракеты (Днепр)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/rockets.png">
            </div>
            <div class="col-md-2 game-score">
              <span>58-0</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/tigers.png">
              <span>Тигры (Харьков)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
      <h2>Дивизион C</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              07.05
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Гепарды (Южный)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/jeps.png">
            </div>
            <div class="col-md-2 game-score">
              <span>12-20</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/dolph.png">
              <span>Дельфины (Мариуполь)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

        <div class="container game-info">
      <h2>Дивизион А</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              08.05
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Пираты (Одесса)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/pirates.png">
            </div>
            <div class="col-md-2 game-score">
              <span>17-13</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/lions.png">
              <span>Львы (Львов)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
      <h2>Дивизион А</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              08.05
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Лесорубы (Ужгород)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/les.png">
            </div>
            <div class="col-md-2 game-score">
              <span>39-38</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/bandits.png">
              <span>Бандиты (Киев)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
      <h2>Дивизион B</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              24.04
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Монархи (Ровно)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/mon.png">
            </div>
            <div class="col-md-2 game-score">
              <span>6-22</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/.png">
              <span>Джокеры (Киев)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

      <div class="container game-info">
      <h2>Дивизион B</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              24.04
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Орлы (Здолбунов)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/eagles.png">
            </div>
            <div class="col-md-2 game-score">
              <span>8-50</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/glad.png">
              <span>Гладиаторы (Хмельницк.)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
    <h2>Дивизион A</h2>
      <div class="row championship">
          <div class="col-md-1 game-date">
            24.04
          </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Бульдоги (Киев)</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/teams/bulgogs.png">
            </div>
            <div class="col-md-2 game-score">
              <span>27-0</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/lions.png">
              <span>Львы (Львов)</span>
            </div>
    </div><!-- row championship -->
  </a>
  </div>



    <div class="container game-info">
    <h2>Дивизион A</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              23.04
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Патриоты (Київ)</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/teams/.png">
            </div>
            <div class="col-md-2 game-score">
              <span>20-42</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/.png">
              <span>Зубры (Минск)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
    <h2>Дивизион C</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              24.04
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Гепарды (Южный)</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/teams/jeps.png">
            </div>
            <div class="col-md-2 game-score">
              <span>6-14</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/vikings.png">
              <span>Викинги (Николоев)</span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>

    <div class="container game-info">
    <h2>Дивизион А</h2>
        <div class="row championship">
            <div class="col-md-1 game-date">
              17.04
            </div>
            <a href="#">
            <div class="col-md-4 team-game">
              <span>Атланты (Харьков)</span>
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/atlants.png">
            </div>
            <div class="col-md-2 game-score">
            <span>26</span><span>-29</span>
            </div>
            <div class="col-md-5 team-game">
            <img src="<?php echo get_template_directory_uri(); ?>/img/teams/pirates.png">
              <span>Пираты (Одесса) </span>
            </div>
      </div><!-- row championship -->
    </a>
    </div>







    </article>
  <?php endwhile; else: // If 404 page error ?>
    <article>

      <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>


    </article>
  <?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
