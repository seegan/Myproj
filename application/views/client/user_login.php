<div class="container-fluid main-container">	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
			</div>
			<div class="col-lg-4 col-md-4 login-container">
				<h3>Login Here</h3>
				<hr>
				<form method="post" action="<?php echo base_url();?>client/user/login_check">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
						<input type="text" name="email" class="form-control input-custom" value="<?php echo set_value('email'); ?>" placeholder="Email">
					</div>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-lock"></i>
						</span>
						<input type="password" name="password" class="form-control input-custom" value="<?php echo set_value('password'); ?>" placeholder="Password">
					</div>
					<?php echo validation_errors(); ?>
					<div class="col-md-10 col-md-offset-1">
					  <button type="submit" class="btn btn-sucess btn-block btn-login">Login</button>
					</div>

				</form>
			</div>
			<div class="col-lg-4 col-md-4">
			</div>
		</div>
	</div>
</div>