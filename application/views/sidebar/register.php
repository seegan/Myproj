<div class="well">


  <form class="form-horizontal" action="<?php echo site_url('/user/register'); ?>" method="POST">
    <fieldset>
      <legend>plz Signup for Write your own story</legend>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-5 control-label">Name</label>
        <div class="col-lg-7">
          <input type="text" class="form-control" id="name" name="name" placeholder="Display Name"  value = "<?php echo set_value('name'); ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-5 control-label">User Name</label>
        <div class="col-lg-7">
          <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value = "<?php echo set_value('username'); ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-5 control-label">Password</label>
        <div class="col-lg-7">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
        </div>
      </div>
       <div class="form-group">
        <label for="inputPassword" class="col-lg-5 control-label">Retype Password</label>
        <div class="col-lg-7">
          <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>