$(document).ready(function(){

	//Client approve button press
	$('.client-approve').click(function(){
		
        var that = $(this);
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
                var tem = JSON.parse(data);
                if(tem.result == true)
                {
                    that.css('display','none');
                    that.parent().find('.client-disapprove').css('display','inline-block');
                    
                    that.parent().parent().find('.client-pending-icon').css('display','none');
                    that.parent().parent().find('.client-approved-icon').css('display','inline-block');

                    $('.clients_count').html(tem.total_clients);
                    $('.approved_clients_count').html(tem.total_pending_clients);
                    $('.pending_clients_count').html(tem.total_approved_clients);

                }
                else
                {

                }
            }
    	});
	});


	//Client dis-approve button press
	$('.client-disapprove').click(function(){

        var that = $(this);
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
                var tem = JSON.parse(data);
                if(tem.result == true)
                {
                    that.css('display','none');
                    that.parent().find('.client-approve').css('display','inline-block');
                
                    that.parent().parent().find('.client-approved-icon').css('display','none');                
                    that.parent().parent().find('.client-pending-icon').css('display','inline-block');

                    $('.clients_count').html(tem.total_clients);
                    $('.approved_clients_count').html(tem.total_approved_clients);
                    $('.pending_clients_count').html(tem.total_pending_clients);
                }
                else
                {
                    
                }
            }
    	});

	});
});
