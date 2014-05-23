// JavaScript Document

function showHideDelButtons()
{
	var cnt = $('.place_c .controls').size();
	
	if(cnt==1)
	{
		// скрываем кнопки
		$('.del_row').hide();
	}
	else
	{
		// показываем кнопки	
		$('.del_row').show();
	}
}

$(document).ready(function(e) {
	
   // var numeric_first = parseInt($('.place_c').find('.controls').attr('data-numeric'));
  //  $('.place_c').find('.controls').html( $('.place_c').find('.controls').html().replace(/%n%/g,numeric_first) ); 
	
	showHideDelButtons();
	
	$('.add_row').click(function() {
		
			var parent_div = $(this).parents('.control-group');
			
			
			var numeric = parseInt( $(parent_div).find('.controls:last-child').data('numeric') );
			var new_numeric = numeric+1;
			//alert(new_numeric);
			
		//	alert(new_numeric);
			var block = $(parent_div).find('.controls:last-child').clone();
			
			
			//alert( $(block).find('.time').val() );
			//$(block).find('.time').val("");
			
			
			
			//alert("last:"+numeric+" and new:"+new_numeric);
			
			block.html( block.html().replace(new RegExp(numeric,'g'),new_numeric) );
			
			block.find('input.time').timepicker({timeFormat : "H:i"});
			
			$.each( $(block).find('input'), function(  ) {
				//alert( $(this).attr('class') +  " = " +  $(this).val());
			     $(this).val("");
			});
            
            
            $.each( $(block).find('.fx_input option'), function( i ) {
				$(this).val(i);
			});
            
          //  $(block).find('.fx_input option').val('0');
         //   $(block).find('.fx_input option:last-child').val('1');
			
			$(parent_div).find('.place_c').append(block);
			$(parent_div).find('.controls:last-child').attr('data-numeric', new_numeric);
			showHideDelButtons();
		});
	
	
	$('.place_c').on("click", ".del_row", function(e) {
			
		
			if (confirm('Точно удалить позицию?')) { 
				 $(e.target).parent('.controls').remove();
				 showHideDelButtons();
				}
			
			
			return false;
		});
		
		
		
		$('.time').timepicker({timeFormat : "H:i"});
	
});