<?php
 $client_list = getAllClients();

$total_clients 			= totalCount($table='pl_user',$condition=array('role_id'=>2,'is_active'=>1));
$total_pending_clients 	= totalCount($table='pl_user',$condition=array('role_id'=>2,'acc_active'=>0,'is_active'=>1));
$total_approved_clients 	= totalCount($table='pl_user',$condition=array('role_id'=>2,'acc_active'=>1,'is_active'=>1));


?>

<div class="container-fluid" style="margin-top:20px;">
	<div class="row">
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-info">
                    <i class="fa fa-users text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1 clients_count"><?php echo $total_clients; ?></p>
                    <p class="text-muted">Clients</p>
                </div>
	        </section>
		</div>
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-success">
                    <i class="fa fa-check text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1 approved_clients_count"><?php echo $total_approved_clients; ?></p>
                    <p class="text-muted">Approved</p>
                </div>
	        </section>
		</div>
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-warning">
                    <i class="fa fa-clock-o text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1 pending_clients_count"><?php echo $total_pending_clients; ?></p>
                    <p class="text-muted">Pending</p>
                </div>
	        </section>
		</div>
	</div>
</div>

<div class="container-fluid" style="margin-top:20px;">
	<div class="panel panel-default main-top">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>check</th>
					<th>Email</th>
					<th class="text-center">Action</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if($client_list)
				{
					foreach ($client_list as $value) 
					{
			?>
						<tr>
							<td><?php echo $value->user_id; ?></td>
							<td><input type="checkbox" name="clist1"></td>
							<td><?php echo $value->email; ?></td>
							<td class="text-center">
							<?php
								if($value->acc_active == 0)
								{
									echo '<a href="" data-clientid = "'.$value->user_id.'" class="btn btn-success client-approve"><i class="fa fa-check-circle"></i>Approve</a>';
									echo '<a href="" data-clientid = "'.$value->user_id.'" class="btn btn-warning client-disapprove" style="display:none;"><i class="fa fa-close"></i>Dis Approve</a>';
								}
								if($value->acc_active == 1)
								{
									echo '<a href="" data-clientid = "'.$value->user_id.'" class="btn btn-success client-approve" style="display:none;"><i class="fa fa-check-circle"></i>Approve</a>';
									echo '<a href="" data-clientid = "'.$value->user_id.'" class="btn btn-warning client-disapprove"><i class="fa fa-close"></i>Dis Approve</a>';
								}
							?>
								<a href="" class="btn btn-danger client-remove"><i class="fa fa-trash-o"></i>Remove</a>
							</td>
							<td>
							<?php
								if($value->acc_active == 0)
								{
									echo '<i class="fa fa-circle-thin fa-circle-thin-yellow client-pending-icon"></i>';
									echo '<i class="fa fa-check-circle fa-check-circle-green client-approved-icon" style="display:none;"></i>';
								}
								if($value->acc_active == 1)
								{
									echo '<i class="fa fa-circle-thin fa-circle-thin-yellow client-pending-icon" style="display:none;"></i>';
									echo '<i class="fa fa-check-circle fa-check-circle-green client-approved-icon"></i>';
								}
							?>
							</td>
						</tr>
			<?php
			 		}
				}
				else
				{
			?>
				<tr>
					<td>1</td>
					<td><input type="checkbox" name="clist1"></td>
					<td>Amery Lee</td>
					<td>amy@gmail.com</td>
					<td><a href="" class="btn btn-info"><i class="fa fa-check-circle"></i>Approve</a></td>
				</tr>
			<?php
				}
			?>
				
			</tbody>
		</table>
	</div>
</div>