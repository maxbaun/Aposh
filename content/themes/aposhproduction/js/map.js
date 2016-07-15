define('map',['jquery','async!https://maps.googleapis.com/maps/api/js?key=AIzaSyAZyFJjtN1lLLz3UoVF_mDelyTQOSZ0-rY'],function($){

  /*******************************************************
          GOOGLE MAPS
  *******************************************************/
  $('.google-map').each(function(){
    var mapId = $(this).attr('id');
    var $map = $("#"+mapId);
    var latitude,longitude;
    latitude = parseFloat($map.attr("data-lat"));
    longitude = parseFloat($map.attr("data-long"));



    if(typeof google !== "undefined"){
      var myMarker = new google.maps.LatLng(latitude, longitude);
      google.maps.event.addDomListener(window, 'load', initialize(mapId,myMarker));

    }
  });

  function initialize(mapId,myMarker) {
    var mapOptions = {
      scrollwheel: false,
      center: myMarker,
      zoom : 17,
      panControl: false,
      zoomControl: false,
      mapTypeControl: false,
      scaleControl: false,
      streetViewControl: false,
      mapTypeControlOptions: {
         mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'grey']
      },
      styles: [{
        stylers: [{
          saturation: -100
        }]
      }]
    };

    var map = new google.maps.Map(document.getElementById(mapId),
      mapOptions);
  }

});
