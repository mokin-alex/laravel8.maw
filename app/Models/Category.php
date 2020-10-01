<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;

class Category extends Model
{
    use HasFactory;

    private static $categories = [
        1 => [
            'id' => 1,
            'slug' => 'auto',
            'title' => 'Авто',
        ],
        2 => [
            'id' => 2,
            'slug' => 'business',
            'title' => 'Экономика',
        ],
        3 => [
            'id' => 3,
            'slug' => 'politics',
            'title' => 'Политика',
        ],
        4 => [
            'id' => 4,
            'slug' => 'sport',
            'title' => 'Спорт',
        ],
    ];

    private static $storageFileName = '\categories.json';

    public static function getCategories()
    {
        //return static::$categories;
        return static::getFromFile(); //теперь берем данные из файла!
    }

    public static function getCategoryNameBySlug($slug)
    {
        $id = Category::getCategoryIdBySlug($slug);
        $category = Category::getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return [];
    }

    public static function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach (static::getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategoryById($id)
    {
        return static::getCategories()[$id] ?? [];
    }

    private static function getFromFile()
    {
        if (\File::isFile(storage_path() . static::$storageFileName)) {
            $str = \File::get(storage_path() . static::$storageFileName);
            return json_decode($str, true, 3, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            return [];
        }
    }

    private static function putToFile($arr)
    {
        return \File::put(storage_path() . static::$storageFileName, json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public static function setExemplar($exemplar)
    {
        $arr=static::getCategories();
        $newId = array_key_last($arr) + 1;
        if (!array_key_exists($newId, $arr)) {
            $exemplar['id'] = $newId;
            $arr[$newId] = $exemplar;
        } else { //этот "костыль" на случай если ключ+1 уже все-таки есть, при работе с БД это невозможно, но у нас пока файл.
            $newId=$newId + 10;
            $exemplar['id'] = $newId;
            $arr[$newId] = $exemplar;
        }
        return static::putToFile($arr);
    }
}
