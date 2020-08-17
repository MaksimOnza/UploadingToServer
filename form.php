<?php 
require_once('header.php');
?>

<body>
	<div class="container">
		<div class="input-group input-group-prepend">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="input-group mb-3">
				  <input class="form-control form-control-file" id="exampleFormControlFile1" type="file" name="inputFile">
				  <input class="btn btn-outline-secondary btn-light	" type="submit" name="submit">
				</div>
			</form>
		</div>
		<div  >
			-------------------------
		</div>
	
<?php
require_once('index.php');

$display = new HttpServer();
$display->out_list_file();

require_once('footer.php');