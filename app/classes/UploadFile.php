<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 16-Mar-18
 * Time: 8:30 AM
 */

namespace App\classes;


class UploadFile
{
    protected $filename;
    protected $max_filesize = 2097152;
    protected $extension;
    protected $path;

    public function getName(){

        return $this->filename;
    }



    protected function setName($file, $name = ""){

        if($name === "") {

            $name = pathinfo($file, PATHINFO_FILENAME);

        }

        $name = strtolower(str_replace(['-', ' '], '-', $name));

        $hash = md5(microtime()); // random string

        $ext = $this->fileExtension($file);

        $this->filename = "{$name}-{$hash}.{$ext}";

    }



    protected function fileExtension($file){

        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }



    public static function fileSize($file){

        $fileObj = new static;

        return $file > $fileObj->max_filesize ? true : false;
    }


    /**
     * Validate file upload in image file
     * @param $file
     * @return bool
     */
    public static function isImage($file){

        $fileObj = new static;
        $ext = $fileObj->fileExtension($file);
        $validExt = array('jpg', 'jpeg', 'png', 'bmp', 'gif');

        if (!in_array(strtolower($ext), $validExt)) {

            return false;
        }

        return true;
    }


    /**
     * Get the path where file was uploaded to
     * @return mixed
     */
    public function path() {

        return $this->path;

    }


    /**
     *
     * move the file to intended location
     * @param $temp_path
     * @param $folder
     * @param $file
     * @param $new_filename
     * @return null|static
     */
    public static function move($temp_path, $folder, $file, $new_filename) {

        $fileObj = new static;

        $ds = DIRECTORY_SEPARATOR;

        $fileObj->setName($new_filename);

        $file_name = $fileObj->getName();


        if(!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $fileObj->path = "{$folder}{$ds}{$file_name}";

        $absolute_path = BASE_PATH."{$ds}public{$ds}$fileObj->path";

        if(move_uploaded_file($temp_path, $absolute_path)) {

            return $fileObj;
        }

        return null;
    }


}