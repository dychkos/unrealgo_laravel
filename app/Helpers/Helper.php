<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function upload_image($files, $model = null): array
    {
        $images = array();

        if ($model) {
            $oldImages = $model->image ?? $model->images;
            self::removeOld($oldImages);
        }


        foreach($files as $file){
            $image_url = Storage::putFile('images',$file,'public');
            array_push($images, ["filename" => $image_url]);
        }

        return $images;
    }

    public static function array_push_assoc($array, $key, $value) {
        $array[$key] = $value;
        return $array;
    }

    public static function stringToBool($str): bool
    {
        if ($str === "true") {
            return true;
        } else {
            return false;
        }
    }

    public static function createSlug($string): string
    {
        return preg_replace('/\s+/', '_', $string);;
    }

    private static function removeOld($oldFiles)
    {
        if ($oldFiles instanceof \Illuminate\Database\Eloquent\Collection) {
            foreach ($oldFiles as $file) {
                $filename = $file->filename;
                if (Storage::exists($filename)) {
                    Storage::delete($filename);
                }
            }
        } else {
            $filename = $oldFiles->filename;

            if (Storage::exists($filename)) {
                Storage::delete($filename);
            }
        }
    }

}
