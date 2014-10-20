<form method="post" action="<?php site_url('siteadmin/website/get/story'); ?>">
<?php $list = crawl_site_list(array('can_crawl'=>1)); ?>
<select name="site_url">
	<option>Select Site</option>
	<?php foreach ($list as $value) {
		echo "<option value=".$value->id.">".$value->url."</option>";
	} ?>
</select>
<input type="checkbox" name="range">Range
<input type="text" name="range_val">
<input type="submit" value="Crawl">
</form>
