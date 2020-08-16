<?php

require_once('db.php');

class HttpServer{

    private $path_list_of_file = '/media/lenovo/Storage/Develop/projects/PHP/UploadingToServer/UploadingToServer/upload/';


   
    public function start(){
        require_once('form.php');
        $this->upload_func('inputFile', 'upload/');
        $this->out_list_file();

            }


    private function upload_func($nameInputForm, $nameUploadDir){
        if(empty($_FILES)){
            
        }
        else{
            $addname = 0;
            $uploaddir = $nameUploadDir;
            if($this->search_same_name_file($this->filtering_array(query_select('files_name')), basename($_FILES[$nameInputForm]['name']))){
                $this->insert_file($uploaddir, $nameInputForm);                
            }
            else{
                $this->insert_file($uploaddir, $nameInputForm);
            }
        }
    }
    

    private function insert_file($uploaddir, $nameInputForm){
        $file_path = $uploaddir.basename($_FILES[$nameInputForm]['name']);
        $file_name =  basename($_FILES[$nameInputForm]['name']);
        query_insert($file_name, $file_path); 
        //execute('INSERT INTO files_name(file_name, file_path) VALUES("'.$file_name.'","'.$file_path.'")');
        move_uploaded_file($_FILES['inputFile']['tmp_name'], $file_path);
        header('location: /index.php');
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
        return array_filter($array, function ($var) {
          return !(($var == '.')or($var == '..')); 
        });
    }


    private function out_list_file(){
        $list_db = query_select('SELECT * FROM files_name;');
        foreach($list_db as $row){
            print '-> <a href="/script.php?id='.$row[0].'">'.$row[1].'</a> <br/>';

        }
    }
}


$start = new HttpServer();
$start->start();