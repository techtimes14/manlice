$(function () {	
	var website_url = $('#website_url').val();
	$('.iambuying').click(function(e){
		$('.iambuying').parent( "label" ).addClass('clicked');
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iambuying_step1',
			data: {},
			success: function(imbuying_response){
				$('.iambuying').parent( "label" ).removeClass('clicked');
				$('#iambuying-steps').html(imbuying_response);
				$.fancybox([ { href : '#iambuying-steps' } ]);
			}
		});		
	});
	
	$('.iamselling').click(function(e){
		$('.iamselling').parent( "label" ).addClass('clicked');
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamselling_step1',
			data: {},
			success: function(imselling_response){
				$('.iamselling').parent( "label" ).removeClass('clicked');
				$('#iamselling-steps').html(imselling_response);
				$.fancybox([ { href : '#iamselling-steps' } ]);
			}
		});		
	});
	
	$('.iamsellingbuying').click(function(e){
		$('.iamsellingbuying').parent( "label" ).addClass('clicked');
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamsellingbuying_step1',
			data: {},
			success: function(iamsellingbuying_response){
				$('.iamsellingbuying').parent( "label" ).removeClass('clicked');
				$('#iamsellingbuying-steps').html(iamsellingbuying_response);
				$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
			}
		});		
	});
	
	
});