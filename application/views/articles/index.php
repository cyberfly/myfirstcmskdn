<!-- content here -->

<a href="<?php echo site_url('article/create'); ?>" class="btn btn-primary">Create Article</a>

<table class="table table-bordered table-striped table-hover">
  <thead>
  	<tr>
  		<th>ID</th>
  		<th>Title</th>
  		<th>Description</th>
  		<th>Category</th>
  		<th>Created At</th>
  		<th>Action</th>
  	</tr>
  </thead>
  <tbody>
  	
  	<?php foreach ($articles as $article) { ?>

  	<tr>
  		<td><?php echo $article->id; ?></td>
  		<td><?php echo $article->title; ?></td>
  		<td><?php echo $article->description; ?></td>
  		<td><?php echo $article->category_name; ?></td>
  		<td><?php echo $article->created_at; ?></td>
  		<td>
  			
  			<a href="<?php echo site_url('article/edit/'.$article->id); ?>" >Edit</a>



  		</td>
  	</tr>

  	<?php } ?>

  </tbody>

</table>

