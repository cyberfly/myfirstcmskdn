<h2>Import Article</h2>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('article/import_article_csv'); ?>" method="post" enctype='multipart/form-data' >
	
	<div class="form-group">
	    <label for="title">CSV File *</label>
	   	<input type="file" name="article_csv" class="form-control"> 	
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>

</form>