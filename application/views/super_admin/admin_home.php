<div class="container-fluid margin-top-20">
	<div class="row">
		<div class="col-lg-6 col-md-6">

		<!-- Profile of the User -->

			<div class="panel panel-profile">
                <div class="panel-heading text-center bg-info">
                    <img alt="" src="<?php echo base_url('assets/role_assets/images/g1.jpg');?>" class="img-circle img80_80">
                    <h3 class="ng-binding">Kumarrr</h3>
                    <p>Admin</p>                    
                </div>
                <div class="list-justified-container">
                    <ul class="list-justified text-center">
                        <li>
                            <p class="size-h3">450</p>
                            <p class="text-muted">Clients</p>
                        </li>
                        <li>
                            <p class="size-h3">34000</p>
                            <p class="text-muted">Recipients</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- end of profile of user -->

            <!-- Topup Fund balance -->

			<div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Topup Fund</strong></div>
                <div class="panel-body">
                	<form class="form-horizontal ng-pristine ng-valid" action="<?php echo base_url('super_admin/topup');?>" method="post">
                        <div class="form-group">
                            <label for="inputAmount" class="col-sm-4 control-label">Topup Amount</label>
                            <div class="col-sm-8">
                                <div class="input-group ui-spinner" data-ui-spinner="">
			                        <input type="number" class="form-control" name="amount">
			                    </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-success">Top up</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <?php echo validation_errors(); ?>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>

            <!-- end of topup fund balance -->

            
            
		</div>

		<div class="col-lg-6 col-md-6">

		<!-- Amount Info Section -->
			<section class="panel panel-box">
                <div class="panel-left panel-item bg-success">
                    <i class="fa fa-usd text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1">5000</p>
                    <p class="text-muted">Fund Balance</p>
                </div>
            </section>
            <section class="panel panel-box">
                <div class="panel-left panel-item bg-danger">
                    <i class="fa fa-usd text-huge"></i>
                </div>
                <div class="panel-right panel-item bg-reverse">
                    <p class="size-h1">1000</p>
                    <p class="text-muted">Paied Amount</p>
                </div>
            </section>
		<!-- End of Amount Info Section -->

		<!-- Accepted fund balance -->

            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Recent Topup </strong></div>
                <div class="panel-body">
                	<ul class="list-group">
                        <?php 
                        if(getCurrentUserSession())
                            {
                                $user_session = getCurrentUserSession();
                                $user_id = $user_session['user_id'];
                            }
                            if(getAdminTopup($user_id))
                            {
                            foreach (getAdminTopup($user_id)->result() as $value) 
                            {
                            ?>
                                <li class="list-group-item">
                                    <span class="media-left media-icon">
                                        <span class="round-icon sm bg-success"><i class="fa fa-paper-plane"></i></span>
                                    </span>
                                    <div class="media-body">
                                        <span class="block"><?php echo $value->topup_amount . " Top Up Success";?></span>
                                        <span class="text-muted"><?php echo mysqldatetime_to_timestamp($value->topup_time);?></span>
                                    </div>
                                </li>
                             <?php }}else{?>    
                                <li class="list-group-item">
                                    <a href="javascript:;" class="media">
                                        <span class="media-left media-icon">
                                            <span class="round-icon sm bg-success"><i class="fa fa-paper-plane"></i></span>
                                        </span>
                                        <div class="media-body">
                                            <span class="block">No records Found</span>
                                        </div>
                                    </a>
                                </li>
                            <?php }?>        
                                             
                    </ul>
                </div>
            </div>

            <!--end Accepted fund balance -->

		</div>
	</div>
</div>