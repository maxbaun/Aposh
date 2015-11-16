require.config({
	"baseUrl": "/content/themes/aposhproduction/js",
  shim : {
      "bootstrap" : { "deps" :['jquery'] },
      "lightbox" : { "deps" :['jquery'] },
      "stellar" : {"deps" : ['jquery']},
      "jqueryui" : {"deps" : ['jquery']},
      "bootstrapSelect" : {"deps" : ['bootstrap']},
      "googleMaps" : {"deps" : ['jquery']}
  },  
	"paths": {
    "async" : "vendor/requirejs-plugins/src/async",
    "djep" : "http://poshlogin.com/check_req_info_form.js",
		"jquery": "vendor/jquery/dist/jquery",
    "bootstrap" : "vendor/bootstrap-sass/assets/javascripts/bootstrap",
    "lightbox" : "vendor/lightbox2/js/lightbox",
    "stellar" : "vendor/stellar/jquery.stellar",
    "jqueryui" : "vendor/jquery-ui/jquery-ui",
    "bootstrapSelect" : "vendor/bootstrap-select/dist/js/bootstrap-select",
    "googleMaps" : "https://maps.googleapis.com/maps/api/js?key=AIzaSyAZyFJjtN1lLLz3UoVF_mDelyTQOSZ0-rY",
    "gallery" : "gallery",
    "map" : "map"
	}
});

require(['jquery','bootstrap','lightbox','stellar','jqueryui','bootstrapSelect','http://poshlogin.com/check_req_info_form.js','gallery','map'], function($) {
  
  var isMobile = false;
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
   isMobile = true;
  }

  // $(document).ready(function(){
    
    /*******************************************************
                    EVENT LISTENERS
    *******************************************************/ 
    $(window).resize(function(){
        resizeFooterContact();
        resizeHomeAvailabityWidget();
        // resizeArrows();
    });
    // launch video in modal window
    $('.launch-video').click(function(e){
        e.preventDefault();
        var data = $(this).attr('data-video');
        $('#videoModal').find('.modal-content .flex-video').append(data);
        $('#videoModal').modal('show');
    }); 
    // empty the modal content when the modal window is closed
    $('#videoModal').on('hide.bs.modal',function(e){
      $('#videoModal').find('.modal-content .flex-video').empty();
    });
    // scroll to top
    $("a[href='#top']").click(function() {
        $("html, body").animate({
          scrollTop: 0
        }, {
          duration: 3000,
          easing: "easeOutExpo"
        });        
      return false;
    });      

    /*******************************************************
                    SITE INITIALIZATION
    *******************************************************/     
    function initializeSite(){
        resizeFooterContact();
        resizeHomeAvailabityWidget();
        // resizeArrows();

        var carouselInterval = ($('body').attr('data-carousel-interval') > 0) ? $('body').attr('data-carousel-interval') : false;
        $('.carousel').carousel({
          interval: carouselInterval
        });
    }

    /*******************************************************
                    SELECT PICKER
    *******************************************************/    
    $('.selectpicker').selectpicker({
        dropupAuto:false,
        mobile:isMobile
    });
    $('.selectpicker').addClass("visible");
    $('.selectpicker').parents('.availability-widget').addClass("visible");
    $('.availability-form .selectpicker').each(function(){
      var val = $(this).attr('data-selected');
      var selector = 'value='+val;
      $(this).find('option[value="'+val+'"]').attr("selected",true);
      $(this).selectpicker('refresh');
    });    





    // center the home availability widget next to the review widget
    function resizeHomeAvailabityWidget(){
        $('.review-widget').each(function(){
            var height = $(this).height();
            $(this).parent().find('.availability-widget-wrapper').height(height);
        });

    }

    // resize arrows on title-text of sections
    function resizeArrows(){
        $('.title-text span').each(function(){
            var height = $(this).height();
            $(this).css('top',-1*height);
        });
    }

    //parallax scrolling
    // $.stellar({
    //     horizontalScrolling: false,
    //     responsive: true
    // });

    // footer center contact
    function resizeFooterContact(){
        var footerHeight = $('#page-footer .news').height();
        $('#page-footer .contact').css('height',footerHeight);
    }      

    initializeSite();
  // });



});




