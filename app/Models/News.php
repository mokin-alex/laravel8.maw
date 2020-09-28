<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private static $news = [
        [
            'id' => 1,
            'title' => 'Путин выдвинут на Нобелевскую премию мира',
            'text'  => 'Президента России Владимира Путина выдвинули на Нобелевскую премию мира — 2021.
            Заявку в расположенный в Осло Нобелевский комитет направил писатель и ученый Сергей Комков.',
            'category' => 'politics',
            'isPrivate' =>  false,
        ],
        [
            'id' => 2,
            'title' => 'ЕС отверг и назвал неоправданными ответные санкции России',
            'text'  => 'Евросоюз отвергает ответные санкции России и считает их неоправданными,
            заявил РИА Новости официальный представитель ЕС Питер Стано.',
            'category' => 'politics',
            'isPrivate' =>  false,
        ],
        [
            'id' => 3,
            'title' => 'Bloomberg признало господство России на мировом рынке пшеницы',
            'text'  => 'В последние годы Россия неуклонно расширяет свою долю на мировом рынке пшеницы
             и стремится закрепить свое лидерство в этой сфере, говорится в статье агентства Bloomberg.',
            'category' => 'business',
            'isPrivate' =>  false,
        ],
        [
            'id' => 4,
            'title' => 'Экономист оценил перспективы курса рубля',
            'text'  => 'Экономист Нарек Авакян оценил перспективы курса рубля. «Рубль сейчас слабеет на фоне геополитики»',
            'category' => 'business',
            'isPrivate' =>  false,
        ],
        [
            'id' => 5,
            'title' => 'Тиньков отказался признать сделку с «Яндексом» продажей',
            'text'  => 'Тиньков отметил, что он не собирается покидать компанию, добавив, что на клиентов предстоящая сделка повлияет только положительно.
            Тиньков отказался признать сделку с «Яндексом» продажей',
            'category' => 'business',
            'isPrivate' =>  true,
        ],
        [
            'id' => 6,
            'title' => 'Chevrolet запустит в продажу две новые модели в РФ в 2021 году',
            'text'  => 'Линейку недорогих машин Chevrolet, представленных на российском рынке, в следующем году расширят до пяти моделей.
            Chevrolet запустит в продажу две новые модели в РФ в 2021 году',
            'category' => 'auto',
            'isPrivate' =>  false,
        ],
    ];
    private static $category = [
        [
            'id' => 1,
            'rubric' => 'auto',
            'text' => 'Авто',
        ],
        [
            'id' => 2,
            'rubric' => 'business',
            'text' => 'Экономика',
        ],
        [
            'id' => 3,
            'rubric' => 'politics',
            'text' => 'Политика',
        ],
        [
            'id' => 4,
            'rubric' => 'sport',
            'text' => 'Спорт',
        ],
    ];

    private static $emptyNews = [

            'id' => 0,
            'title' => 'Новость не найдена!',
            'text'  => '',
            'category' => ''
    ];

    private static $categoryNotFound = 'Не найдена рубкрика.';

    public static function getNews(){
        return static::$news;
    }

    public static function getCategory(){
        return static::$category;
    }

    public static function getNewsId($id){
        // если считать, что id новости идут всегда по-порядку (не пропускается значение), то можно искать так:
        if (!isset(static::getNews()[$id-1])) return static::$emptyNews;
        if (static::getNews()[$id-1]['id'] == $id) {
            return static::getNews()[$id-1];
            } else { //но это предположение (что id - без пропусков) слишком ненадежное, поэтому пока через foreach :(
            foreach (static::getNews() as $newsItem) {
                if ($newsItem['id'] == $id) { return $newsItem; }
            }
        }
        return static::$emptyNews;
    }

    public static function getNewsByCategory($cat_id){
        foreach (static::getNews() as $newsItem) {
            if ($newsItem['category'] == $cat_id) {
                 $newsByCategory[] = $newsItem;
            }
        }
        if (isset($newsByCategory)) {
            return $newsByCategory;
        } else {
            $newsByCategory[]=static::$emptyNews;
            return $newsByCategory;
        }

    }

    public static function getCategoryText($cat_id){
        foreach (static::getCategory() as $categoryItem) {
            if ($categoryItem['rubric'] == $cat_id) {
                return $categoryItem['text'];
            }
        }
        return static::$categoryNotFound;
    }

}
