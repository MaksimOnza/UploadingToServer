<?php



class HttpServer{

    private $path_list_of_file = '/media/lenovo/Storage/Develop/projects/PHP/UploadingToServer/UploadingToServer/upload/';

   
    public function start(){
        require_once('form.php');
        $this->upload_func('inputFile', 'upload/');
        $this->out_list_file($this->filtering_array(scandir($this->path_list_of_file)));

    }


    private function upload_func($nameInputForm, $nameUploadDir){
        if(empty($_FILES)){
            
        }
        else{
            $addname = 0;
            $uploaddir = $nameUploadDir;
            echo $this->search_same_name_file($this->filtering_array(scandir($this->path_list_of_file)), basename($_FILES[$nameInputForm]['name']));
            if($this->search_same_name_file($this->filtering_array(scandir($this->path_list_of_file)), basename($_FILES[$nameInputForm]['name']))){
                $addname = rand(0, 10000); 
                $upload = $uploaddir.$addname.'_'.basename($_FILES[$nameInputForm]['name']);        
                move_uploaded_file($_FILES['inputFile']['tmp_name'], $upload);
                header('location: /index.php');
            }
            else{
                $upload = $uploaddir.basename($_FILES[$nameInputForm]['name']);
                move_uploaded_file($_FILES['inputFile']['tmp_name'], $upload);
                header('location: /index.php');
            }
        }
    }


    static private function filter_name_file($var){
        if(($var == '.')or($var == '..')){
            return False;
        }
        else{
            return True;
        }
        
    }
    

    private function search_same_name_file($sortedArray, $fileName){
        foreach($sortedArray as $value){
            if($fileName == $value){
                return True;
            }
        }
        return False;
    }


    private function filtering_array($array){
        $sortered_array = array_filter($array, 'HttpServer::filter_name_file');
        return $sortered_array;
    }


    private function out_list_file($sortedArray){
        foreach ($sortedArray as $value) {
            echo '-> <a href="http://'.$_SERVER['HTTP_HOST'].'/upload/'.$value.'">'.$value.'</a> <br/>';
        }
    }
}



$start = new HttpServer();
$start->start();