
$(document).ready(function() {
<<<<<<< HEAD
    
    
    
    
    
    
    
    
    $('.main-slider').customslider({
        slideshow: true
    });
    
    $('.record a').fancybox({
            
            padding: 0,
           
            minWidth: 539,
            //wrapCSS: '../css/style.css',
        
    });
=======
>>>>>>> 58792daeff3c952632561b902392660582d952b2

 
  $("#slide-top").owlCarousel(
    {
     afterInit : function(){

        $('.owl-next').click(function(){

                var id=parseInt($('.slider-list ul li .active').data('jump'),10);

                id= id+1!=$('.slider-list ul li a').length+1 ? id+1 : 1;

                $('.slider-list ul li .active').removeClass('active');

                $('.slider-list ul li a').each(function(){

                    if (parseInt($(this).data('jump'),10)==id)
                        $(this).addClass('active');
                })

            })
    }});

    var owl = $("#slide-top").data('owlCarousel');

  $('.slider-list ul li a').click(function(){

    $('.slider-list ul li a').each(function(){
        $(this).removeClass('active');
    })

    $('.owl-prev').on("click",function(){

        var id=parseInt($('.slider-list ul li .active').data('jump'),10);
        console.log(id)

        id= id-1==0 ?  $('.slider-list ul li a').length : id-1 ;

        $('.slider-list ul li .active').removeClass('active');

        $('.slider-list ul li a').each(function(){

            if (parseInt($(this).data('jump'),10)==id)
            {
                $(this).addClass('active');
            }
        })
    })

    

    $(this).addClass('active')
    console.log($(this).data('jump'))

    owl.goTo(parseInt($(this).data('jump'),10));
    return false;

  })
    var sliderOptions = {
        $AutoPlay: true,
        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: [
                {$Duration:1200,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$FlyDirection:9,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleHorizontal:0.2,$ScaleVertical:0.1,$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
                {$Duration:800,$Delay:80,$Cols:12,$FlyDirection:4,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}
            ],
            $TransitionsOrder: 1,
            $ShowLink: true
        }
    };

    var sliders = [];
    $('.sliders-block .slider').each(function(index, item) {
        var slider = $(item);
        slider.find('.slider_container').attr('id', 'slider_container-' + index);
        sliders.push( {
            container: slider,
            jssor_obj: new $JssorSlider$('slider_container-' + index, sliderOptions)
        } );
        if ( index > 0 ) {
            slider.hide();
        }
    });

    if ( sliders.length ) {
        var slider_nav = $('.sliders-block .switch_slider');
        $('li', slider_nav).first().addClass('active');

        var current = 0;
        $('li', slider_nav).click(function() {
            var self = $(this);
            var index = self.index();
            if ( index == current ) {
                return false;
            }

            var selectSlider = sliders[index].container;
            var currentSlider = sliders[current].container;
            selectSlider.stop(true, true).fadeIn(300);
            currentSlider.stop(true, true).fadeOut(300);

            current = index;

            $('li', slider_nav).removeClass('active');
            self.addClass('active');
            return false;
        });
    }

//    var jssor_slider = new $JssorSlider$('slider_container-1', sliderOptions);
});