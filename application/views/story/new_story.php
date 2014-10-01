<div class="container" style="margin-top:40px">
<div class="row">
	<div class="col-lg-8 col-md-8">
		<div class="well">

		  <form class="form-horizontal" action="<?php echo site_url('/user/register'); ?>" method="POST" style="padding:20px;">
		    <fieldset>
		      <legend>Write your own story</legend>

				<div class="form-group">
				  <label class="control-label" for="inputDefault">Title</label>
				  <input type="text" class="form-control col-lg-6" id="inputDefault" autocomplete="off">
				</div>

				<div class="form-group">
				  <label class="control-label" for="inputDefault">Category</label>
				  <input type="text" class="form-control" id="inputDefault" autocomplete="off">
				</div>

				<div class="form-group">
				  <label class="control-label" for="inputDefault">Story</label>
				  <textarea id="input" class="form-control" style="width:400px; height:200px"></textarea>
				</div>

				<div class="form-group">
			          <button class="btn btn-default">Cancel</button>
			          <button type="submit" class="btn btn-primary">Submit</button>
      			</div>

		    </fieldset>
		  </form>
		</div>
	</div>

	<div class="col-lg-4 col-md-4">
		

		<?php $this->load->view('sidebar/related_story'); ?>
		<?php $this->load->view('sidebar/hot_story'); ?>


	</div>

	</div>

</div>
</div>
