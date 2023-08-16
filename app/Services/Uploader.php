<?php
 
namespace App\Services;

use Storage;

class Uploader
{
    public function requestUpload($name, $data, $dir, $original = null){ //name of element in array, data -> request array, dir -> directory to upload, original -> original element if we have not any element with file
        if(isset($data[$name])){
            $data[$name] = $data[$name]->store($dir);
            Storage::setVisibility(storage_path('app/'.$dir), 'public');
        }
        return $data;
    }
}