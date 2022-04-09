<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function upload_image($files)
    {
        $images = array();

        foreach($files as $file){
            $image_url = Storage::putFile('images',$file,'public');
            array_push($images,["filename" => $image_url]);
        }

        return $images;
    }

    public static function array_push_assoc($array, $key, $value) {
        $array[$key] = $value;
        return $array;
    }
}