<?php
 $client_list = getAllClients();
?>

<div class="container-fluid" style="margin-top:20px;">
	<div class="row">
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-info">
                    <i class="fa fa-users text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1">1234</p>
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
                    <p class="size-h1">1200</p>
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
                    <p class="size-h1">34</p>
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
									echo '<a href="" class="btn btn-info"><i class="fa fa-check-circle"></i>Approve</a>';
								}
								if($value->acc_active == 1)
								{
									echo '<a href="" class="btn btn-warning"><i class="fa fa-close"></i>Dis Approve</a>';
								}
							?>
								<a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i>Remove</a>
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