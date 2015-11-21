function initialize() {

var lat = 57.097727;
var lng = 65.622086;
	 
	 var styles = [
    {
       "stylers": [
		  { "hue": "#00ffff" },
		  { "gamma": 0.87 },
		  { "lightness": 11 },
		  { "saturation": -66 }
		]

    }
  ];

 var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});

 var latlng = new google.maps.LatLng(57.178778,65.562589);
 var settings = {
 zoom: 11,
 center: latlng,
 mapTypeControl: true,
 mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
 disableDefaultUI: true,

  //scrollwheel: false,
  
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
   
	
 navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
  mapTypeId: google.maps.MapTypeId.ROADMAP
 };
var map = new google.maps.Map(document.getElementById("map"), 
settings);

var companyLogo = new google.maps.MarkerImage('/googleMap/ball.png',
  new google.maps.Size(50,48),
  new google.maps.Point(0,0),
  new google.maps.Point(24,48)
);

var companyPos = new google.maps.LatLng(lat, lng);
var companyMarker = new google.maps.Marker({
  position: companyPos,
  icon: companyLogo,
  map: map,
  title:"Some title"
});

var companyPos2 = new google.maps.LatLng(57.178778,65.562589);
var companyMarker2 = new google.maps.Marker({
  position: companyPos2,
  icon: companyLogo,
  map: map,
  title:"Some title"
});

map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
  
}
initialize();