<?php

namespace App\Repositories;

use App\Models\Uploader;
use App\Repositories\BaseRepository;
use Storage;

class UploaderRepository extends BaseRepository
{
    protected $fieldSearchable = [

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Uploader::class;
    }

    public function uploadRequest($name, $dir, $data){
        //$data = json_decode(json_encode($data));
        if(isset($data[$name])){
            $file = $data[$name]->store('up/'.$dir);
            $data[$name] = $file;
            Storage::setVisibility('up/'.$dir, 'public');
            Storage::setVisibility($file, 'public');
        }
        return $data;
    }
    public function uploadUpdateRequest($name, $dir, $data, $slider){
        //$data = json_decode(json_encode($data));
        if(isset($data[$name])){
            $file = $data[$name]->store('up/'.$dir);
            $data[$name] = $file;
            Storage::setVisibility('up/'.$dir, 'public');
            Storage::setVisibility($file, 'public');
        }else{
            $data[$name] = $slider->image;
        }
        return $data;
    }
}
