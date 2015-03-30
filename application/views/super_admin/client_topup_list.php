<div class="container-fluid" style="margin-top:20px;">
	<div class="row">
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-info">
                    <i class="fa fa-users text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1 clients_count">1000</p>
                    <p class="text-muted">Total Topups</p>
                </div>
	        </section>
		</div>
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-success">
                    <i class="fa fa-check text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1 approved_clients_count">3000</p>
                    <p class="text-muted">Approved Topups</p>
                </div>
	        </section>
		</div>
		<div class="col-lg-4 col-md-4">
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-warning">
                    <i class="fa fa-clock-o text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1 pending_clients_count">10000</p>
                    <p class="text-muted">Pending Topups</p>
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
					<th>Name</th>
					<th>Email</th>
					<th>Amount</th>
					<th class="text-center">Action</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				 <?php 
                    if(getPendingTopupClientDetails())
                    {
                    foreach (getPendingTopupClientDetails()->result() as $value) 
                    {
                    ?>
						<tr>
							<td><?php echo $value->user_id;?></td>
							<td><input type="checkbox" name="clist1"></td>
							<td><?php echo getUserMeta($value->user_id,'first_name');?></td>
							<td><?php echo $value->email;?></td>
							<td><?php echo $value->topup_amount;?></td>
							<td class="text-center">
								<a href="#" class="btn btn-success client-approve"><i class="fa fa-check-circle"></i>Approve</a>
							</td>
							<td>
							<i class="fa fa-circle-thin fa-circle-thin-yellow client-pending-icon"></i>
							</td>
						</tr>
					<?php }}else{?>
					<?php }?> 
			</tbody>
		</table>
	</div>
</div>