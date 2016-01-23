function show_error(msg){
	ht = '<div class="alert alert-error" style="width:400px;"><a href="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
	}
function show_success(msg){
	ht = '<div class="alert alert-success"><a href="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
	}
function show_info(msg){
	ht = '<div class="alert alert-info"><a href="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
	}
	
