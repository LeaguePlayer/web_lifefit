$(document).ready(function(e){  
  var myMap;
  var assetsUrl = $('#map').attr('data-assets');
  ymaps.ready(init);

  function init(){
    myMap = new ymaps.Map('map', {
      center: [57.09715477, 65.61989250],
      zoom: 16,
      controls: []
    });
    
    myMap.behaviors.disable('scrollZoom');
    
    firstGym = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: [57.097648, 65.621078],
            },
        }, {
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: assetsUrl + '/img/ball.png',
            // Размеры метки.
            iconImageSize: [50, 48],
        });
    
    secondGym = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: [57.14653477, 65.65191750],
            },
        }, {
            iconLayout: 'default#image',
            iconImageHref: assetsUrl + '/img/ball.png',
            iconImageSize: [50, 48],
        });
    
    thirdGym = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: [57.178778, 65.562589],
            },
        }, {
            iconLayout: 'default#image',
            iconImageHref: assetsUrl + '/img/ball.png',
            iconImageSize: [50, 48],
        });

    myMap.geoObjects
      .add(firstGym)
      .add(secondGym);
      .add(thirdGym);
  }
  
  function setCenter(coordsX, coordsY){
    myMap.panTo([
      [coordsX, coordsY],
    ]);
  }
  
  $('.goToPoint').click(function(e){
    setCenter($(this).attr('data-coordsX'), $(this).attr('data-coordsY'));
  });
});
