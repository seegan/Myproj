<div class="container-fluid" style="margin-top:20px;">
	<div class="panel panel-default main-top">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Time</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(getCurrentUserSession())
                    {
                        $user_session = getCurrentUserSession();
                        $ref_id = $user_session['user_id'];
                    }
                    if(getAllRecipientDetailsByRefID($ref_id))
                    {
                    foreach (getAllRecipientDetailsByRefID($ref_id)->result() as $value) 
                    {
                    ?>
				<tr>
					<td><?php echo $value->recipient_id;?></td>
					<td><?php echo $value->first_name;?></td>
					<td><?php echo $value->email;?></td>
					<td><?php echo mysqldatetime_to_timestamp($value->datetime);?></td>
					<td>
						<a href="<?php echo base_url('reipients_manage/managerecipients/view/'.$value->recipient_id)?>" class="btn btn-success"><i class="fa fa-eye"></i>  View</a>
						<a href="<?php echo base_url('reipients_manage/managerecipients/edit/'.$value->recipient_id)?>" class="btn btn-info"><i class="fa fa-pencil"></i>  Edit</a>
						<a href="<?php echo base_url('reipients_manage/managerecipients/delete/'.$value->recipient_id)?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>  Delete</a>
					</td>

				</tr>
				<?php }}else{?>
				<tr>
					<td class="text-center alert alert-danger" colspan="3">No records Added</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>