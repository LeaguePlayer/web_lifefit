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
						 
                          
							  $(form).find('input[type="text"]').val('');
							 
						  
					  }
					  else
					  {
                            
						  $.each(data, function(key, value){
						      console.log(key);
							  $(form).find('input[data-field="'+key+'"]').parent('.row').addClass('error');
							 
						  });

						   
					  }

				  }
				});   


		return false;
    } );
    
    
 
	
});


