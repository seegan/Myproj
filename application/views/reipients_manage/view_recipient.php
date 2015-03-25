<div class="container-fluid margin-top-20">
	<div class="row">
		<div class="col-lg-3 col-md-3"></div>
		<div class="col-lg-6 col-md-6 panel panel-default">

			<?php if(getRecipientByID($recipient_id))
			{
				foreach (getRecipientByID($recipient_id)->result() as $value) {?>
					<div class="form-horizontal" id="printableArea">
					<fieldset>
						<legend>View Recipient<h6 class="pull-right">Recipient Id : <?php echo $value->recipient_id;?></h6></legend>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">First Name</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->first_name;?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Middle Name</label>
							</div>
							<div class="col-lg-6">
								<label class="control-label">: <?php echo $value->middle_name;?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Last Name</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->last_name;?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Gender</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->gender;?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Phone</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->phone;?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Reference Number</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->ref_num;?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Email</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->email;?></label>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label class="control-label">Location</label>
							</div>
							<div class="col-lg-6 col-md-6">
								<label class="control-label">: <?php echo $value->location;?></label>
							</div>
					    </div>

						<div class="form-group">
						<div class="col-lg-6 col-md-6 col-lg-offset-4 col-md-offset-4">
						<button onclick="printDiv('printableArea')" class="btn btn-primary"><i class="fa fa-print"></i>  Print</button>
						</div>
						</div>
					</fieldset>
				</div>
				<?php } } ?>
		</div>
		<div class="col-lg-3 col-md-3"></div>
	</div>
</div>