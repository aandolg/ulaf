// Avoid `console` errors in browsers that lack a console.
(function () {
  var method;
  var noop = function () {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
}
}());

// Place any jQuery/helper plugins in here.
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



  $('.owl-home-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      items:1,
      autoplay: true,
      autoplayTimeout: 8000,
  })



  $('.owl-player-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText:['&#x3c;','&#x3e;'],
      items:1,
      autoplay: true,
      autoplayTimeout: 5000,
  })



  $('.owl-team-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText:['&#x3c;','&#x3e;'],
      items:1,
      autoplay: true,
      autoplayTimeout: 5000,
  })


  $('.owl-people-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText:['&#x3c;','&#x3e;'],
      items:1,
      autoplay: true,
      autoplayTimeout: 5000,
  })


  $('.owl-footer-slide').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      items:4,
      autoplay: true,
      autoplayTimeout: 5000,
  })
