<h2>Edit Article</h2>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('article/edit'); ?>" method="post" >

	<input type="hidden" name="id" value="<?php echo set_value('id', $article->id); ?>" >
	
	<div class="form-group">
	    <label for="title">Title</label>
	    <input name="title" type="text" class="form-control" id="title" placeholder="" value="<?php echo set_value('title', $article->title); ?>" >
	</div>

	<div class="form-group">
	    <label for="description">Description</label>

	    <textarea name="description" id="description" class="form-control" rows="10"><?php echo set_value('description', $article->description); ?></textarea>

	</div>

	<button type="submit" class="btn btn-primary">Submit</button>

</form>