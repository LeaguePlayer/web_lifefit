$(document).ready(function() {



    $( document ).on( "submit", "form.ajaxForm", function(){
        
        var form  = $(this);
		var data = $(this).serialize();

        
		
		$('.ajaxForm .error').removeClass('error');

		

		$.ajax({
				  url: $(this).attr('action'),
				  type: "POST",
				  data: data,
				  dataType: "json",

				  success: function(data) {

               
                    
					  if(data == "OK")
					  {
                $.fancybox.open({
                                padding : 0,
                                href:'/site/thankyou',
                                type: 'ajax'
                            });
						  //window.location.href = "/page/spasibo";
					  }
					  else
					  {
                            
						  $.each(data, function(key, value){
						      
							  $('.ajaxForm input[data-field="'+key+'"]').parent('.row').addClass('error');
							 // $('textarea[data-field="'+key+'"]').css('border','1px solid #F00');
							 // $('input[data-field="'+key+'"]').css('border','1px solid #F00');
							 // $('span[data-field="'+key+'"]').css('color','#F00');
						  });

						   
					  }

				  }
				});   


		return false;
    } );
    
    
 
	
});


