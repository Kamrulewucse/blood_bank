/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/geolocation/modules/geolocation_google_maps/js/MapFeature/geolocation-marker-infowindow.js. */
(function(o){'use strict';o.behaviors.geolocationMarkerInfoWindow={attach:function(n,e){o.geolocation.executeFeatureOnAllMaps('marker_infowindow',function(o,n){o.addMarkerAddedCallback(function(e){if(typeof(e.locationWrapper)==='undefined'){return};var i=e.locationWrapper.find('.location-content');if(i.length<1){return};i=i.html();var a={content:i.toString(),disableAutoPan:n.disableAutoPan};if(n.maxWidth>0){a.maxWidth=n.maxWidth};var t=new google.maps.InfoWindow(a);e.addListener('click',function(){if(n.infoWindowSolitary){if(typeof o.infoWindow!=='undefined'){o.infoWindow.close()};o.infoWindow=t};t.open(o.googleMap,e)});if(n.infoAutoDisplay){if(o.googleMap.get('tilesloading')){google.maps.event.addListenerOnce(o.googleMap,'tilesloaded',function(){google.maps.event.trigger(e,'click')})}
else{jQuery.each(o.mapMarkers,function(o,n){google.maps.event.trigger(n,'click')})}}});return!0},e)},detach:function(o,n){}}})(Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/geolocation/modules/geolocation_google_maps/js/MapFeature/geolocation-marker-infowindow.js. */;