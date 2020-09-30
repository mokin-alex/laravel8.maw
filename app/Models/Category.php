<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $categories = [
        1=>[
            'id' => 1,
            'slug' => 'auto',
            'title' => 'Авто',
        ],
        2=>[
            'id' => 2,
            'slug' => 'business',
            'title' => 'Экономика',
        ],
        3=>[
            'id' => 3,
            'slug' => 'politics',
            'title' => 'Политика',
        ],
        4=>[
            'id' => 4,
            'slug' => 'sport',
            'title' => 'Спорт',
        ],
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryNameBySlug($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $category = Category::getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return [];
    }

    public static function getCategoryIdBySlug($slug) {
        $id = null;
        foreach (static::getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategoryById($id) {
        if (array_key_exists($id, static::getCategories()))
            return static::getCategories()[$id];
        else
            return [];
    }

}
