$(window).load(function() {

  // ISOTOPE  
  $(".grid").isotope({
  	itemSelector: '.car-item',
  	layoutMode: 'fitRows'
  });
  $('.iso-nav ul li').on("click",function(){
      $(this).addClass('active').siblings().removeClass('active');
      var selector =$(this).attr('data-filter');
      $(".grid").isotope({
          filter: selector,
          animationOption: {
  	         duration: 750,
  	         easing: 'linear',
  	         queue: false,
          }
      });
      return false;
  });

  // LIGHT BOX VIDEO
    $('.grid-item-lightbox').fancybox({
        padding : 0,
        openEffect  : 'elastic',
        closeBtn: false
    });
});

// OUR SPECIAL CAROUSEL

$('.special-carousel').not('.slick-initialized').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    infinite: false,
    fade: false,
        responsive: [
        {
            breakpoint: 1300,
            settings: {
                slidesToShow: 2,
                variableWidth: false,
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                variableWidth: false,
                dots: true,
                arrows: false,
            }
        }
    ]
});

$('.special-carousel-2').not('.slick-initialized').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    infinite: false,
    fade: false,
        responsive: [
        {
            breakpoint: 1300,
            settings: {
                slidesToShow: 3,
                variableWidth: false,
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                variableWidth: false,
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                variableWidth: false,
                dots: true,
                arrows: false,
            }
        }
    ]
});

/* SELECTION */
$('.autos-selection').dropkick();

/* SERVICE TIME SELECTION */
$('.time-selection').dateDropper();

// Filter Slider

$( function() {
    // Price
    $("#slider-range").slider({
      range: true,
      min: 10,
      max: 345,
      values: [10, 345 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      "k - $" + $( "#slider-range" ).slider( "values", 1 )+"k" );

    // Year
    $("#slider-range-year").slider({
      range: true,
      min: 2010,
      max: 2018,
      values: [2010, 2018 ],
      slide: function( event, ui ) {
        $( "#year-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#year-amount" ).val( "$" + $( "#slider-range-year" ).slider( "values", 0 ) +
      " - " + $( "#slider-range-year" ).slider( "values", 1 ) );

    // Search Inventory Price
    $("#search-inventory-price").slider({
      range: true,
      min: 1200,
      max: 95000,
      values: [1200, 95000 ],
      slide: function( event, ui ) {
        $( "#amount-min" ).val( "$" + ui.values[ 0 ] );
        $( "#amount-max" ).val( "$" + ui.values[ 1 ] );
      }
    });
    $( "#amount-min" ).val( "$" + $( "#search-inventory-price" ).slider( "values", 0 ) );
    $( "#amount-max" ).val( "$" + $( "#search-inventory-price" ).slider( "values", 1 ) );
   
    $("#search-inventory-price-old").slider({
      range: true,
      min: 700,
      max: 65000,
      values: [700, 65000 ],
      slide: function( event, ui ) {
        $( "#amount-min-old" ).val( "$" + ui.values[ 0 ] );
        $( "#amount-max-old" ).val( "$" + ui.values[ 1 ] );
      }
    });
    $( "#amount-min-old" ).val( "$" + $( "#search-inventory-price-old" ).slider( "values", 0 ) );
    $( "#amount-max-old" ).val( "$" + $( "#search-inventory-price-old" ).slider( "values", 1 ) );

    // Sidebar | Checkbox options
    $('.options-checkbox').each(function(e) {
      $('.options-checkbox').on('click',function(e){
        $(this).toggleClass("open");
        e.preventDefault();
        return false;
      });
       e.preventDefault();
        return false;
    });
});

// Slider

$('.product-carousel').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.carousel-gallery'
});
$('.carousel-gallery').slick({
  slidesToShow: 6,
  slidesToScroll: 0,
  asNavFor: '.carousel',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});

// Sell

$('ol.steps>li').on('click', function() { 
  $(this).addClass('active').siblings().removeClass('active');
});

//input number
$('.qplus').on('click', function() { 
  $("#custom-quantity").val(function(i, oldval) {
      return ++oldval;
  });
});
$(".qminus").on('click', function(){
   $("#custom-quantity").val(function(i, oldval) {
      oldval = --oldval;
      if (oldval > 1) {
        return oldval;
      } else {
        return 1;
      }
    });
});

// TOP SEARCH

$('#search-open').on('click', function() { 
  $('.topsearch-form').addClass('active');
});
$('#search-close').on('click', function() {
  $('.topsearch-form').removeClass('active');
});

// Sidebar | Show more options
$('#show-more').on('click', function() { 
  $('#show-more').slideUp();
  $('.options-container').slideDown('linear');
});
$('#show-less').on('click', function() { 
  $('#show-more').fadeIn();
  $('.options-container').slideUp('swing');
});

// BREADCRUMB

var pagetitle = location.pathname.replace(/_|.html/g," ").split('/').slice(-1);
document.getElementById("current-page-title").innerHTML = pagetitle;
var page = location.pathname.replace(/_|.html/g," ").split('/').slice(-1);
document.getElementById("currentpage").innerHTML = page;

