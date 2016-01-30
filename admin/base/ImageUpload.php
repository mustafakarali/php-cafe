<?php
/**
 *	ImageUpload class for uploading images
 ************************************************************************
 *	@Author Xiaoming Yang
 *	@Date	28-01-2016  09:43
 ************************************************************************
 *	update time			editor				updated information
 *
 */

class ImageUpload {
    private $uploadParams;

    public function  __construct(){
        $this->uploadParams = require(APP_PATH.DIRECTORY_SEPARATOR."conf/service.config.php");
    }

    public function upload(){
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        $inputName = $this->uploadParams['upload']['inputName'];
        $resultArr = [];                //result array, will be encoded to JSON and return
        if (is_uploaded_file($_FILES[$inputName]['tmp_name'])) {
            $upFile = $_FILES[$inputName];
            $name=$upFile["name"];          //uploaded file name
            $type=$upFile["type"];          //type of uploaded file
            $size=$upFile["size"];          //size of uploaded file
            $tmp_name=$upFile["tmp_name"];  //temporary saved file name
            $error=$upFile["error"];        //error information, refer to Error Messages Explained in PHP

            if($error == '0'){
                //check the uploaded file type
                $okType = false;
                switch ($type){
                    case 'image/pjpeg':$okType=true;
                        break;
                    case 'image/jpeg':$okType=true;
                        break;
                    case 'image/gif':$okType=true;
                        break;
                    case 'image/png':$okType=true;
                        break;
                }
                if($okType){
                    $realName = date("mdHi")."_".$name;
                    $destination = rtrim($this->uploadParams['upload']['image'],DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$realName;
                    $moveRes = move_uploaded_file($tmp_name,$destination);
                    if($moveRes){
                        $resultArr = ['errCode' => '0',
                            'destination' => $destination,
                            'size'=>(ceil($size/1024))." KB",
                            'name'=> $realName];
                    }else{
                        $resultArr = ['errCode' => '1','errInfo' => 'file move failed'];
                    }

                }else{
                    $resultArr = ['errCode' => '2','errInfo' => 'The uploaded file format is not jpg/jpeg/gif/png'];
                }
            }else{
                $resultArr = ['errCode' => '3','errInfo' => $phpFileUploadErrors[$error]];
            }
        }else{
            $resultArr = ['errCode' => '4','errInfo' => 'error: '.error_get_last()];
        }
        $resultJson = json_encode($resultArr);
        echo $resultJson;
    }
    public function deleteImage($imagePath){
        $imageName = substr($imagePath,strrpos($imagePath,'/'));
        $realPath = rtrim($this->uploadParams['upload']['image'],'/').$imageName;
        if(file_exists($realPath)){
            return unlink($realPath);
        }else{
            return false;
        }
    }
}