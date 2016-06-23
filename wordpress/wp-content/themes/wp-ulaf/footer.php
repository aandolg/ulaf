      <footer>
        <div class="container">
          <div class="row">

            <div class="col-sm-6 col-sm-6 col-xs-6">
              <p>© Ulaf 2016</p>
            </div><!-- col-sm-6 -->

            <div class="col-sm-6 col-sm-6 col-xs-6">
              <ul class="list-inline social">
                <li>
                  <a href="mailto:info@ulafua.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/email.png" alt="ulaf"></a>
                </li>
                <li>
                  <a href="https://www.facebook.com/ULAF-1701766046732430" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/facebook.png" alt="ulaf Facebook"></a>
                </li>
                </li>
                <li>
                  <a href="https://vk.com/public116822349" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/vkontakte.png" alt="ulaf VK"></a>
                </li>
                <li>
                  <a href="https://twitter.com/ULAFCOOL" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/twitter.png" alt="ulaf Twitter"></a>
                </li>
                <li>
                  <a href="https://www.youtube.com/channel/UCX-eSs3MKCWTAnm3rQJ7WJQ" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/youtube.png" alt="ulaf YouTube"></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/ULAFCOOL/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/instagram.png" alt="ulaf Instagram"></a>
                </li>
              </ul>
            </div><!-- col-sm-6 -->

          </div><!-- row -->
        </div><!-- container -->
      </footer>
    </div><!-- wrapper -->



  <link rel="stylesheet" href="http://www.owlcarousel.owlgraphic.com/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="http://www.owlcarousel.owlgraphic.com/assets/owlcarousel/assets/owl.theme.default.min.css">

  <script src="http://www.owlcarousel.owlgraphic.com/assets/vendors/jquery.min.js"></script>
  <script src="http://www.owlcarousel.owlgraphic.com/assets/owlcarousel/owl.carousel.js"></script>

  <script src="http://www.jqueryscript.net/demo/jQuery-Plugin-For-Fixed-Table-Header-Footer-Columns-TableHeadFixer/tableHeadFixer.js"></script>
  <script>
    $(document).ready(function() {
      $(".team-score").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-qb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-wr").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-te").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-c").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-cb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-de").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-dt").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-fb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-fs").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-ilb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-mlb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-olb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-k").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-p").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-rb").tableHeadFixer({"head" : false, "left" : 1});
      $(".player-score-ss").tableHeadFixer({"head" : false, "left" : 1});
    });
  </script>

  <script>
  $('.owl-home-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      items:1,
      autoplay: true,
      autoplayTimeout: 8000,
  })
  </script>

  <script>
  $('.owl-player-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText:['&#x3c;','&#x3e;'],
      items:1,
      autoplay: true,
      autoplayTimeout: 5000,
  })
  </script>

  <script>
  $('.owl-team-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText:['&#x3c;','&#x3e;'],
      items:1,
      autoplay: true,
      autoplayTimeout: 5000,
  })
  </script>
  <script>
  $('.owl-people-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText:['&#x3c;','&#x3e;'],
      items:1,
      autoplay: true,
      autoplayTimeout: 5000,
  })
  </script>
  <script>
  $('.owl-footer-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      items:4,
      autoplay: true,
      autoplayTimeout: 5000,
  })
  </script>


  </body>
</html>
