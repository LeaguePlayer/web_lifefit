var intervalID;



$(document).ready(function(){
   
   
   
   
   $('.to_right').click(function(){
    
    slider.goRight( $(this) );
    
   });
    
    $('.to_left').click(function(){
        
        slider.goLeft( $(this) );
        
    });
  
  window.intervalID = setInterval(sec, 500) // использовать функцию
  
});



$(window).resize(function(){
    
   slider.adaptiveSlider();
    
});




// (2)
function sec() { 
  slider.adaptiveSlider();
  clearInterval(window.intervalID);
}



var slider = 
{
    
    adaptiveSlider:function()
    {
         var width_screen = $(window).width();
         
        
        $('.block_with_img').css('width', width_screen);
        
        var height_img = $('.block_with_img.active').height();
      //  var height_img = $('.block_with_img.active').css('height');
     // var height_img = $('.big_photos').height();
     
     console.log(height_img);
        $('.slider_big').css('height', height_img);
        
        var activeElementIndex = $( ".block_with_img" ).index( $('.block_with_img.active') );
        var pixels_to_slide = $(window).width()*activeElementIndex*-1;
        console.log(pixels_to_slide);
        $('.big_photos').css('left', pixels_to_slide);
    },
    
    goRight: function( arrow ){
       
        var activeElementIndex = $( ".block_with_img" ).index( $('.block_with_img.active') );
        
        
       
       
        if(activeElementIndex<$( ".block_with_img" ).size()-1)
        {
            var pixels_to_slide = $(window).width()*(activeElementIndex+1)*-1;
            var nextElementIndex = $( ".block_with_img" ).index( $('.block_with_img.active').next() );
            slider.animate(pixels_to_slide,'right');
            
            
            
                    if(nextElementIndex==$( ".block_with_img" ).size()-1)
                    {
                        // here i can change right arrow
                        slider.disableArrow(arrow);
                    }
                    
        }
        
        
        
        
    },
    
    goLeft: function( arrow ){
       
        var activeElementIndex = $( ".block_with_img" ).index( $('.block_with_img.active') );
        
        
       
       
        if(activeElementIndex>0)
        {
            var pixels_to_slide = $(window).width()*(activeElementIndex-1)*-1;
            var nextElementIndex = $( ".block_with_img" ).index( $('.block_with_img.active').prev() );
            slider.animate(pixels_to_slide,'left');
            
            
            
                    if(nextElementIndex==0)
                    {
                        // here i can change left arrow
                        slider.disableArrow(arrow);
                    }
                    
        }
        
        
        
        
    },
    
    animate: function(position, direction){
        if($(".big_photos").is(':not(:animated)'))
        {
            console.log(position);
            $('.big_photos').animate({left:position}, {
                    duration: 1000,
                    specialEasing: {
                      
                      left: "easeInCirc"
                    },complete: function() {
                 
                    switch(direction)
                    {
                        case 'right':
                            var next_block = $('.block_with_img.active').next();
                        break;
                        
                        case 'left':
                            var next_block = $('.block_with_img.active').prev();
                        break;
                    }
                    
                    
                    var active_block = $('.block_with_img.active');
                    active_block.removeClass('active');
                    next_block.addClass('active');
                    
                    
                    
       
                    
                    
                   
                 
                } } );
        }
        
        
    },
    
    disableArrow: function(arrow){
        
        console.log("ARROW DISABLED");
        
    },
    
    enableArrow: function(arrow){
        
        console.log("ARROW ENABLED");
        
    }
    
}

