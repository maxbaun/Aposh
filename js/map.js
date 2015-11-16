define('map',['jquery','async!https://maps.googleapis.com/maps/api/js?key=AIzaSyAZyFJjtN1lLLz3UoVF_mDelyTQOSZ0-rY'],function($){


  /*******************************************************
                  GOOGLE MAPS
  *******************************************************/
  var mapId = "map";
  var $map = $("#"+mapId);
  var latitude,longitude;
  latitude = parseFloat($map.attr("data-lat"));
  longitude = parseFloat($map.attr("data-long"));

  var mapStyles = [
      {
        featureType: "all",
        elementType: "all",
        stylers: [
          { saturation: -100 } //grey-scales the map
        ]
      }
  ];

  if(typeof google !== "undefined" && $('#map').length>0){
      var myMarker = new google.maps.LatLng(latitude, longitude);
      initialize();
      // google.maps.event.addDomListener(window, 'load', initialize);
      // console.log("google defined");

  }

  function initialize() {
      var mapOptions = {
          scrollwheel: false,
          center: myMarker, 
          zoom : 17,
          mapTypeControlOptions: {
               mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'grey']
          }       
      };

      console.log("GOOGLE MAPS1!!!");

      var map = new google.maps.Map(document.getElementById(mapId),
          mapOptions);
          
      var mapType = new google.maps.StyledMapType(mapStyles,{name:"Greyscale"});
      map.mapTypes.set('grey',mapType);
      map.setMapTypeId('grey');       

      var image = (Modernizr.retina) ? $map.attr("data-marker-retina"): $map.attr("data-marker");
      var marker = new google.maps.Marker({
          position: myMarker,
          map: map,
          icon: image
      });
  }

});