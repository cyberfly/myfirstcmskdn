<h2>Create Article</h2>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('article/create'); ?>" method="post" >
	
	<div class="form-group">
	    <label for="title">Title</label>
	    <input name="title" type="text" class="form-control" id="title" placeholder="" value="<?php echo set_value('title'); ?>" >
	</div>

	<div class="form-group">
	    <label for="description">Description</label>

	    <textarea name="description" id="description" class="form-control" rows="10"><?php echo set_value('description'); ?></textarea>

	</div>

	<button type="submit" class="btn btn-primary">Submit</button>

</form>