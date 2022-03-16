<?php

namespace App\Helpers;

class ControllerHelper
{
    public static function addOnlyExists($requestData){
        $processed = [];
        foreach ($requestData as $key => $value){
            if($value){
                $processed = Helper::array_push_assoc($processed,$key,$value);
            }
        }
        return $processed;

    }
}
