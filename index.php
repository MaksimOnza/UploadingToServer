<?php



class HttpServer{
		

	public function __construct(){
	}

	public function start(){
		require_once('form.php');
		if(empty($_FILES)){}
		else{
			$uploaddir = 'upload/';
			$upload = $uploaddir.basename($_FILES['inputFile']['name']);
			move_uploaded_file($_FILES['inputFile']['tmp_name'], $upload);
			header('location: /index.php');
		}
		$upload = '/media/lenovo/Storage/Develop/projects/PHP/UploadingToServer';
		$files = scandir($upload);
		foreach ($files as $key => $value) {
		    echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/upload/'.$value.'">'.$value.'</a> <br/>';
		}
	}
}



$start = new HttpServer();
$start->start();