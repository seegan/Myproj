<div class="container-fluid" style="margin-top:20px;">
	<div class="panel panel-default main-top">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(getCurrentUserSession())
                    {
                        $user_session = getCurrentUserSession();
                        $user_id = $user_session['user_id'];
                    }
                    if(getUserAllDetailsByRoleID($role_id,$user_id))
                    {
                    foreach (getUserAllDetailsByRoleID($role_id,$user_id)->result() as $value) 
                    {
                    ?>
				<tr>
					<td><?php echo $value->user_id;?></td>
					<td><?php echo $value->email;?></td>
					<td>
						<a href="#" class="btn btn-info"><i class="fa fa-check-circle"></i>View</a>
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