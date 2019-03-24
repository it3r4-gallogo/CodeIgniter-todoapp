

$(document).ready(function(){
	
	$('#userform').submit(function(e){
		e.preventDefault();
		var url   = $(this).attr('action');


		$.ajax({

			url : url,
			method: 'POST',
			data : $(this).serialize(),
			success: function(res){
				$('#success-message').text(res.message);
			},
			error: function(err){
				var errors  =  JSON.parse(err.responseText)
				
			}
		})
	})


})