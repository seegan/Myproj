<div class="well">

  <form class="form-horizontal" action="<?php echo site_url('/user/login'); ?>" method="POST">
    <fieldset>
      <legend>Login</legend>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-5 control-label">User Name</label>
        <div class="col-lg-7">
          <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value = "<?php echo set_value('username'); ?>">
        </div>
        <div class="col-lg-7 col-lg-offset-5 text-danger">
          <?php echo form_error('username'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-5 control-label">Password</label>
        <div class="col-lg-7">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
        </div>
        <div class="col-lg-7 col-lg-offset-5 text-danger">
          <?php echo form_error('password'); ?>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-7 col-lg-offset-5">
          <button class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>