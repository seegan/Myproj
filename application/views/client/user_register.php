<div class="container-fluid reg-container-fluid">
<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2">
		</div>
		<div class="col-lg-4 col-md-4 register-container">
			<h3>Register Here</h3>
			<hr>
			<form method="post" action="<?php echo base_url();?>client/user/post_register">
				<div class="radio">
	                <label>
	                  <input type="radio" name="ClientType" id="ClientType" value="0" checked>
	                  Company
	                </label>
           		</div>
           		<div class="radio">
	                <label>
	                  <input type="radio" name="ClientType" id="ClientType" value="1">
	                  Individual
	                </label>
           		</div>

           		<!-- Company Block -->

				<div class="company-block">

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user"></i>
					</span>
					<input type="text" name="c_name" class="form-control input-custom" value="<?php echo set_value('c_name'); ?>" placeholder="Company Name">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user"></i>
					</span>
					<input type="text" name="c_regnum"class="form-control input-custom" value="<?php echo set_value('c_regnum'); ?>" placeholder="Registration Number">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-envelope"></i>
					</span>
					<input type="text" name="c_email" class="form-control input-custom" value="<?php echo set_value('c_email'); ?>" placeholder="Company Email">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-lock"></i>
					</span>
					<input type="text" name="c_pass" class="form-control input-custom" placeholder="Password">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-lock"></i>
					</span>
					<input type="text" name="c_cpass" class="form-control input-custom" placeholder="Confirm Password">
				</div>

			</div>

			<!-- end Company Block -->
			
			<!-- individual Block -->
			<div class="individual-block">
			<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user"></i>
					</span>
					<input type="text" name="u_fname" class="form-control input-custom" value="<?php echo set_value('u_fname'); ?>" placeholder="First Name">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user"></i>
					</span>
					<input type="text" name="u_lname" class="form-control input-custom" value="<?php echo set_value('u_lname'); ?>" placeholder="Last Name">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-envelope"></i>
					</span>
					<input type="text" name="u_email" class="form-control input-custom" value="<?php echo set_value('u_email'); ?>" placeholder="Email">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-lock"></i>
					</span>
					<input type="password" name="u_pass" class="form-control input-custom" placeholder="Password">
				</div>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-lock"></i>
					</span>
					<input type="password" name="u_cpass"class="form-control input-custom" placeholder="Confirm Password">
				</div>
			</div>
			<!-- end individual Block -->
				<?php echo validation_errors(); ?>
				<div class="col-md-10 col-md-offset-1">
				  <button type="submit" class="btn btn-primary btn-block btn-register">Register</button>
				</div>

			</form>
		</div>
		<div class="col-lg-4 col-md-4">					
			<div class="rp-step-title">
				<h2><i class="fa fa-list"></i>  Steps To Complete</h2>
			</div>
			<div class="rp-step-cont">
				<ul>
				<li><span class="rp-step-num">1</span>An e-commerce payment system facilitates the acceptance of electronic payment for online transactions</li>
				<li><span class="rp-step-num">2</span>An e-commerce payment system facilitates the acceptance of electronic payment for online transactions</li>
				<li><span class="rp-step-num">3</span>An e-commerce payment system facilitates the acceptance of electronic payment for online transactions</li>
				<li><span class="rp-step-num">4</span>An e-commerce payment system facilitates the acceptance of electronic payment for online transactions</li>
				<li><span class="rp-step-num">5</span>An e-commerce payment system facilitates the acceptance of electronic</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-2 col-md-2">
		</div>
	</div>
</div>
</div>