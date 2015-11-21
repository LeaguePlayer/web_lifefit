

$(document).ready(function() {

    
    
    
    if ($('html').hasClass('lt-ie7'))
    {
        document.location="http://dev.lifefit72.ru/page/redirekt-s-ie-7";

    } else {
        
    $(window).resize(function(){

        if ($(this).width()<1300)
        {
            $('.slide-prev,.slide-next').hide();
        }
            else {

                $('.slide-prev,.slide-next').show();
            }
    })
    
    $('.controlMap.a_print').click(function(){
      
        window.print();    
        
    });
        
    $('.main-slider').customslider({
        slideshow: true
    });
    
    $('.run_fancy').fancybox({
            
            padding: 0,
           
            minWidth: 300,
            //wrapCSS: '../css/style.css',
        
    });
    
    
    $('.video img').on('click',function(){
        $.fancybox({ 
            'padding'  : 0,
            'autoScale'    : false,
            'transitionIn' : 'none',
            'transitionOut'   : 'none',
            //'title'   : $(this).data('title'),
            'width'   : 640,
            'height' : 385,
            'href'   : $(this).data('url'),
            'type'    : 'swf',
            'swf'  : { 'wmode' : 'transparent',
            'allowfullscreen'  : 'true' } 
        }); 
        return false;
    })


 
 $("#slide-top").owlCarousel();
    var owl = $("#slide-top").data('owlCarousel');
    setTimeout(function() {
        $('.slide-prev').on("click",function(){

        var id=parseInt($('.slider-list ul li .active').data('jump'),10);
        id= id-1==0 ?  $('.slider-list ul li a').length : id-1 ;

        owl.goTo(id);

        $('.slider-list ul li .active').removeClass('active');

        $('.slider-list ul li a').each(function(){

            if (parseInt($(this).data('jump'),10)==id)
            {
                $(this).addClass('active');
            }
        })
    })    
    $('.slide-next').on("click",function(){

             

            var id=parseInt($('.slider-list ul li .active').data('jump'),10);
            id= id+1!=$('.slider-list ul li a').length+1 ? id+1 : 1;

            owl.goTo(id);

            $('.slider-list ul li .active').removeClass('active');

            $('.slider-list ul li a').each(function(){

                if (parseInt($(this).data('jump'),10)==id)
                    $(this).addClass('active');
            })

        })
    }, 3000);
    

    //var owl = $("#slide-top").data('owlCarousel');

  $('.slider-list ul li a').click(function(){

    $('.slider-list ul li a').each(function(){
        $(this).removeClass('active');
    })

    

    

    $(this).addClass('active')


    var id=parseInt($(this).data('jump'),10);

    owl.goTo(id);
    return false;

  })
    var sliderOptions = {
        $AutoPlay: true,
        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: [
                {$Duration:1200,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$FlyDirection:9,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleHorizontal:0.2,$ScaleVertical:0.1,$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
             //   {$Duration:800,$Delay:80,$Cols:12,$FlyDirection:4,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}
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

    
    adaptiveShadows();
    
}
});

$(window).resize(function(){
   
    adaptiveShadows();
    
    
});

function adaptiveShadows()
{
    var width_screen = $(window).width();
    var width_gradient = (width_screen - 1070)/2;
    $('.gradient').css('width', width_gradient);
    $('.left_gradient').css('left', -width_gradient);
    $('.right_gradient').css('right', -width_gradient);
    
}