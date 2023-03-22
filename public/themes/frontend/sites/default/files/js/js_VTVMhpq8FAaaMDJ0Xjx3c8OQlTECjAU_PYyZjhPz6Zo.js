/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/geolocation/modules/geolocation_google_maps/js/MapFeature/geolocation-markerclusterer.js. */
(function(e){'use strict';e.behaviors.geolocationMarkerClusterer={attach:function(r,a){e.geolocation.executeFeatureOnAllMaps('marker_clusterer',function(r,e){if(typeof MarkerClusterer==='undefined'){return};var a='';if(e.imagePath){a=e.imagePath}
else{a='https://cdn.jsdelivr.net/gh/googlemaps/js-marker-clusterer@gh-pages/images/m'};var t={};if(typeof e.styles!=='undefined'){t=e.styles};r.addPopulatedCallback(function(r){if(typeof r.markerClusterer==='undefined'){r.markerClusterer=new MarkerClusterer(r.googleMap,r.mapMarkers,{imagePath:a,styles:t,maxZoom:e.maxZoom,gridSize:e.gridSize,zoomOnClick:e.zoomOnClick,averageCenter:e.averageCenter,minimumClusterSize:e.minimumClusterSize})};r.addMarkerAddedCallback(function(e){r.markerClusterer.addMarker(e)});r.addMarkerRemoveCallback(function(e){r.markerClusterer.removeMarker(e)})});r.addUpdatedCallback(function(e,r){if(typeof e.markerClusterer!=='undefined'){e.markerClusterer.clearMarkers()}});return!0},a)},detach:function(e,r){}}})(Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/geolocation/modules/geolocation_google_maps/js/MapFeature/geolocation-markerclusterer.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/geolocation/modules/geolocation_google_maps/js/MapFeature/geolocation-control-zoom.js. */
(function(o){'use strict';o.behaviors.geolocationZoomControl={attach:function(t,n){o.geolocation.executeFeatureOnAllMaps('control_zoom',function(o,t){o.addPopulatedCallback(function(o){var n={zoomControlOptions:{position:google.maps.ControlPosition[t.position],style:google.maps.ZoomControlStyle[t.style]}};if(t.behavior==='always'){n.zoomControl=!0}
else{n.zoomControl=undefined};o.googleMap.setOptions(n)});return!0},n)},detach:function(o,t){}}})(Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/geolocation/modules/geolocation_google_maps/js/MapFeature/geolocation-control-zoom.js. */;