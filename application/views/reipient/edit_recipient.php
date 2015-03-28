<div class="container-fluid margin-top-20">
	<div class="row">
		<div class="col-lg-3 col-md-3"></div>
		<div class="col-lg-6 col-md-6 panel panel-default">
			<?php if(getRecipientByID($recipient_id))
			{

				foreach (getRecipientByID($recipient_id)->result() as $value) {?>

			<form class="form-horizontal" action="<?php echo base_url();?>reipient/register_recipient/update_recipient" method="post">
				<fieldset>
					<legend>Edit Recipient</legend>
					<div class="form-group">
						<label for="inputFirstName" class="col-lg-3 control-label">First Name *</label>
						<div class="col-lg-9">
							<input type="text" name="fname" class="form-control" id="inputFirstName"  value="<?php echo $value->first_name; ?>">
							<?php echo form_error('fname', '<div style="color:red">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputMiddleName" class="col-lg-3 control-label">Middle Name</label>
						<div class="col-lg-9">
							<input type="text" name="mname" class="form-control" id="inputMiddleName" value="<?php echo $value->middle_name;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLastName" class="col-lg-3 control-label">Last Name</label>
						<div class="col-lg-9">
							<input type="text" name="lname" class="form-control" id="inputFirstName" value="<?php echo $value->last_name;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Gender *</label>
						<div class="col-lg-9">
							<div class="radio">
								<label>
								<input type="radio" name="gender" value="Male" <?php if($value->gender == "Male") echo set_radio('gender', 'Male' , TRUE); else echo set_radio('gender', 'Male' ); ?>  >
								Male
								</label>
							</div>
							<div class="radio">
								<label>
								<input type="radio" name="gender" value="Female" <?php if($value->gender == "Female") echo set_radio('gender', 'Female' , TRUE); else echo set_radio('gender', 'Female' ); ?> >
								Female
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPhone" class="col-lg-3 control-label">Phone Number *</label>
						<div class="col-lg-9">
							<input type="text" name="phone" class="form-control" id="inputPhone"  value="<?php echo $value->phone;?> ">
						</div>
					</div>
					<div class="form-group">
						<label for="inputReference" class="col-lg-3 control-label">Reference Number</label>
						<div class="col-lg-9">
							<input type="text" name="refnum" class="form-control" id="inputReference" value="<?php echo $value->ref_num; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-3 control-label">Email *</label>
						<div class="col-lg-9">
							<input type="text" name="email" class="form-control" id="inputEmail" value="<?php echo $value->email; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="textArea" class="col-lg-3 control-label">Location *</label>
						<div class="col-lg-9">
							<textarea class="form-control" rows="3" id="textArea" name="location" ><?php echo $value->location; ?></textarea>
						</div>
				    </div>

					<div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
						<input type="hidden" value="<?php 
							if(getCurrentUserSession())
                            {
                                $user_session = getCurrentUserSession();
                                echo $user_session['user_id'];
                            }
                            ?>" name="user_id">
                    <?php echo validation_errors(); ?>
                    	<input type="hidden" name="recip_id" value="<?php echo $recipient_id;?>">
					<button type="submit" class="btn btn-primary">Update</button>
					</div>
					</div>
				</fieldset>
			</form>
			<?php } } ?>
		</div>
		<div class="col-lg-3 col-md-3"></div>
	</div>
</div>