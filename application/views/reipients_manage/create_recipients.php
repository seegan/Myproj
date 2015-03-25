<div class="container-fluid margin-top-20">
	<div class="row">
		<div class="col-lg-3 col-md-3"></div>
		<div class="col-lg-6 col-md-6 panel panel-default">
			<form class="form-horizontal" action="<?php echo base_url();?>reipients_manage/register_recipient/post_recipient" method="post">
				<fieldset>
					<legend>Create Recipient</legend>
					<div class="form-group">
						<label for="inputFirstName" class="col-lg-3 control-label">First Name</label>
						<div class="col-lg-9">
							<input type="text" name="fname" class="form-control" id="inputFirstName" placeholder="First Name *" value="<?php echo set_value('fname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputMiddleName" class="col-lg-3 control-label">Middle Name</label>
						<div class="col-lg-9">
							<input type="text" name="mname" class="form-control" id="inputMiddleName" placeholder="Middle Name" value="<?php echo set_value('mname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLastName" class="col-lg-3 control-label">Last Name</label>
						<div class="col-lg-9">
							<input type="text" name="lname" class="form-control" id="inputFirstName" placeholder="Last Name" value="<?php echo set_value('lname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Gender</label>
						<div class="col-lg-9">
							<div class="radio">
								<label>
								<input type="radio" name="gender" value="Male" <?php echo set_radio('gender', 'Male'); ?>  >
								Male
								</label>
							</div>
							<div class="radio">
								<label>
								<input type="radio" name="gender" value="Female" <?php echo set_radio('gender', 'Female'); ?> >
								Female
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPhone" class="col-lg-3 control-label">Phone Number</label>
						<div class="col-lg-9">
							<input type="tel" pattern="[0-9]{10}" name="phone" class="form-control" id="inputPhone" placeholder="Phone Number *" value="<?php echo set_value('phone'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputReference" class="col-lg-3 control-label">Reference Number</label>
						<div class="col-lg-9">
							<input type="text" name="refnum" class="form-control" id="inputReference" placeholder="Reference Number" value="<?php echo set_value('refnum'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-3 control-label">Email</label>
						<div class="col-lg-9">
							<input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email *" value="<?php echo set_value('email'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="textArea" class="col-lg-3 control-label">Location</label>
						<div class="col-lg-9">
							<textarea class="form-control" rows="3" id="textArea" name="location" placeholder="Address *" value="<?php echo set_value('location'); ?>" ></textarea>
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
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="col-lg-3 col-md-3"></div>
	</div>
</div>