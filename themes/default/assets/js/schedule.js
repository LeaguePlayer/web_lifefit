$(document).ready(function() {

    $('.cell.busy.slise').hover(function(){
        var id_sport = $(this).data('sport');
        
        $('.cell.busy.slise[data-sport="'+id_sport+'"]').addClass('selected');
        
        
        $.each($('.cell.busy.slise.selected'),function( key, value ){
           var selected_day = $(this).data('day');
           var selected_time = $(this).data('time');
           
           $(".compromiss_width .week_of_day[data-day='"+selected_day+"']").addClass('selected');
           $(".time_cell .time[data-time='"+selected_time+"']").addClass('selected');
        });
       
    },function(){
        $('.cell.busy.slise.selected').removeClass('selected');
         $(".compromiss_width .week_of_day.selected").removeClass('selected');
         $(".time_cell .time.selected").removeClass('selected');
    });
	
});


$(window).scroll(function() {

        var top = $(document).scrollTop();
        
        var p = $(".place_for_menu");
	    var offset = p.offset();
       

        if (top > offset.top) $(".redline.fly").css({top: '0', position: 'fixed'}) 
          else {
            $(".redline.fly").css({top: '0px', position: 'relative'})
          }

    });