<?php


namespace App\Traits;
use Illuminate\Support\Facades;

trait DataFromToFile
{

    private static function getFromFile()
    {
        if (\Illuminate\Support\Facades\File::isFile(storage_path() . static::$storageFileName)) {
            $str = \Illuminate\Support\Facades\File::get(storage_path() . static::$storageFileName);
            return json_decode($str, true, 3, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            return [];
        }
    }

    private static function putToFile($arr)
    {
        return \Illuminate\Support\Facades\File::put(storage_path() . static::$storageFileName, json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public static function setExemplar($exemplar)
    {
        $arr = static::getAll();
        $newId = array_key_last($arr) + 1;
        if (!array_key_exists($newId, $arr)) {
            $exemplar['id'] = $newId;
            $arr[$newId] = $exemplar;
        } else { //этот "костыль" на случай если ключ+1 уже все-таки есть, при работе с БД это невозможно, но у нас пока файл.
            $newId = $newId + 10;
            $exemplar['id'] = $newId;
            $arr[$newId] = $exemplar;
        }
        return static::putToFile($arr);
    }

}
