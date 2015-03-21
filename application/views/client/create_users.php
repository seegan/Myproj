<div class="container-fluid margin-top-20">
	<div class="row">
		<div class="col-lg-3 col-md-3"></div>
		<div class="col-lg-6 col-md-6 panel panel-default">
			<form class="form-horizontal" action="<?php echo base_url();?>client/register_user/post_register" method="post">
				<fieldset>
					<legend>Create Users</legend>
					<div class="form-group">
						<label for="select" class="col-lg-3 control-label">Users Type</label>
						<div class="col-lg-9">
							<select class="form-control" id="select" name="cl_type">
								<?php if(getUserRoleType()){foreach (getUserRoleType()->result() as $value) {?>
								<option value="<?php echo $value->role_id;?>"><?php echo $value->name;?></option>
								<?php }}?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputFirstName" class="col-lg-3 control-label">First Name</label>
						<div class="col-lg-9">
							<input type="text" name="fname" class="form-control" id="inputFirstName" placeholder="First Name" value="<?php echo set_value('fname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputLastName" class="col-lg-3 control-label">Last Name</label>
						<div class="col-lg-9">
							<input type="text" name="lname" class="form-control" id="inputFirstName" placeholder="Last Name" value="<?php echo set_value('lname'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-3 control-label">Email</label>
						<div class="col-lg-9">
							<input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo set_value('email'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-lg-3 control-label">Password</label>
						<div class="col-lg-9">
							<input type="text" name="password" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo set_value('password'); ?>">
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