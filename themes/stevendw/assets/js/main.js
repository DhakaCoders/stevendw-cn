(function($) {
var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
if($("ul.slick-dots li").length == 1){
   $("ul.slick-dots").hide();
}
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};
if($('.mHc6').length){
  $('.mHc6').matchHeight();
};
$(window).load(function() {
//matchHeightCol
  if($('.mHc').length){
    $('.mHc').matchHeight();
  };
  if($('.mHc1').length){
    $('.mHc1').matchHeight();
  };
  if($('.mHc2').length){
    $('.mHc2').matchHeight();
  };
  if($('.mHc3').length){
    $('.mHc3').matchHeight();
  };
  if($('.mHc4').length){
    $('.mHc4').matchHeight();
  };
  if($('.mHc5').length){
    $('.mHc5').matchHeight();
  };
  if($('.mHc6').length){
    $('.mHc6').matchHeight();
  };
});

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}




/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



if( $('.hamburger-cntlr').length ){
  $('.hamburger-cntlr').click(function(){
    $('body').toggleClass('allWork');
  });
}
if( $('li.menu-item-has-children a').length ){
  $('li.menu-item-has-children a').click(function(e){
   event.preventDefault();
   $(this).next().slideToggle(300);
   $(this).parent().toggleClass('this-sub-menu-active');
 });
}


if (windowWidth >= 767) {
  if( $('.hm-banner-cntlr').length ){
    var windowHeight = $(window).height();
    if (windowHeight >= 678) {
      $('.hm-banner-cntlr').css('height', windowHeight);
    }
  }
}

  
  
if( $('.elementGridSlider').length ){
  $('.elementGridSlider').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 4000,
    speed: 700,
    slidesToShow: 3,
    slidesToScroll: 1
    });
}

if( $('.scrollto').length ){
  $('.scrollto').on('click', function(e){
    e.preventDefault();
    var togo = $(this).data('to');
    goToByScroll(togo, 0);
  });
}

function goToByScroll(id, offset){
  if(id){
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate(
      {scrollTop: $(id).offset().top - offset},
      500);
  }
}


if (windowWidth <= 991) {
  if( $('.dfpGrdSlider').length ){
    $('.dfpGrdSlider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      autoplay: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }
}

if (windowWidth <= 767) {
  if( $('.relatedProGrdSlider').length ){
    $('.relatedProGrdSlider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      autoplay: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
  }
}



//Masonry


if( $('.news-overview-grid-items-cntlr').length ){
  $('.news-overview-grid-items-cntlr').masonry({
    // options
    itemSelector: '.sdw-masonry-item',
  }).masonry('layout');
};




new WOW().init();

})(jQuery);