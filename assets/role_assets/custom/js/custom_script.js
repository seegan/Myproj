$(document).ready(function(){

	//Client approve button press
	$('.client-approve').click(function(){
		
		var client_id = $(this).data('clientid');

		$.ajax({
            type:"POST" ,
            url: ajax_url.url,
            data:{
            	'function' : 'admin_client_action',
            	'action' : 'admin_client_approve',
                'client_id': client_id,
            },
            success:function(data){
                alert("dfd");
            }
    	});


	});

	//Client dis-approve button press
	$('.client-disapprove').click(function(){

		var client_id = $(this).data('clientid');

		$.ajax({
            type:"POST" ,
            url: ajax_url.url,
            data:{
            	'function' : 'admin_client_action',
            	'action' : 'admin_client_disapprove',
                'client_id': client_id,
            },
            success:function(data){
                alert("dfd");
            }
    	});

	});
});
