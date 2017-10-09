<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom PDF style -->
    <link href="<?php echo base_url(); ?>assets/css/pdf_style.css" rel="stylesheet">
</head>
<body>
	
	<!-- pdf content here -->

	<?php 

	if (isset($content)) {
		$this->load->view($content);
	}

	?>
</body>
</html>