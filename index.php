<?php

require_once('db.php');

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
            /*echo $this->search_same_name_file($this->filtering_array(scandir($this->path_list_of_file)), basename($_FILES[$nameInputForm]['name']));*/
            if($this->search_same_name_file($this->filtering_array(scandir($this->path_list_of_file)), basename($_FILES[$nameInputForm]['name']))){
                $addname = rand(0, 10000); 
                
                //$uploaddir записать в базу как значение, а ключ "$addname.'_'.basename($_FILES[$nameInputForm]['name'])
                $upload = $uploaddir.$addname.basename($_FILES[$nameInputForm]['name']);        
                move_uploaded_file($_FILES['inputFile']['tmp_name'], $upload);
                execute('INSERT INTO files_name(file_name, file_path) VALUES("'.$addname.basename($_FILES[$nameInputForm]['name']).'","'.$upload.'")');
                
            }
            else{
                //$uploaddir записать в базу как значение, а ключ "$addname.'_'.basename($_FILES[$nameInputForm]['name'])

                $upload = $uploaddir.basename($_FILES[$nameInputForm]['name']);
                move_uploaded_file($_FILES['inputFile']['tmp_name'], $upload);
                execute('INSERT INTO files_name(file_name, file_path) VALUES("'.$addname.basename($_FILES[$nameInputForm]['name']).'","'.$upload.'")');
            }
        }
    }


    private function send_headers(){
        $file = $this->path_list_of_file.'test.pdf';
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


    private function out_list_file($sortedArray){
        foreach ($sortedArray as $value) {
            //в ссылке добавить параметр id 
            $list_db = execute('SELECT * FROM files_name;');
            //echo $list_db;
            echo '-> <a href="/script.php?id='.$id.'">'.$value.'</a> <br/>';
        }
    }
}



$start = new HttpServer();
$start->start();


//Запретить браузеру открытие pdf файла.
//Файл хранить под каким угодно именем, но выдавать на скачку с оригинальным именем.