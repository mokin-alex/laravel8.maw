<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private static $news = [
        1=>[
            'id' => 1,
            'title' => 'Путин выдвинут на Нобелевскую премию мира',
            'text'  => 'Президента России Владимира Путина выдвинули на Нобелевскую премию мира — 2021.
            Заявку в расположенный в Осло Нобелевский комитет направил писатель и ученый Сергей Комков.',
            'category_id' => 3,
            'isPrivate' =>  false,
        ],
        2=>[
            'id' => 2,
            'title' => 'ЕС отверг и назвал неоправданными ответные санкции России',
            'text'  => 'Евросоюз отвергает ответные санкции России и считает их неоправданными,
            заявил РИА Новости официальный представитель ЕС Питер Стано.',
            'category_id' => 3,
            'isPrivate' =>  false,
        ],
        3=>[
            'id' => 3,
            'title' => 'Bloomberg признало господство России на мировом рынке пшеницы',
            'text'  => 'В последние годы Россия неуклонно расширяет свою долю на мировом рынке пшеницы
             и стремится закрепить свое лидерство в этой сфере, говорится в статье агентства Bloomberg.',
            'category_id' => 2,
            'isPrivate' =>  false,
        ],
        4=>[
            'id' => 4,
            'title' => 'Экономист оценил перспективы курса рубля',
            'text'  => 'Экономист Нарек Авакян оценил перспективы курса рубля. «Рубль сейчас слабеет на фоне геополитики»',
            'category_id' => 2,
            'isPrivate' =>  false,
        ],
        5=>[
            'id' => 5,
            'title' => 'Тиньков отказался признать сделку с «Яндексом» продажей',
            'text'  => 'Тиньков отметил, что он не собирается покидать компанию, добавив, что на клиентов предстоящая сделка повлияет только положительно.
            Тиньков отказался признать сделку с «Яндексом» продажей',
            'category_id' => 2,
            'isPrivate' =>  true,
        ],
        6=>[
            'id' => 6,
            'title' => 'Chevrolet запустит в продажу две новые модели в РФ в 2021 году',
            'text'  => 'Линейку недорогих машин Chevrolet, представленных на российском рынке, в следующем году расширят до пяти моделей.
            Chevrolet запустит в продажу две новые модели в РФ в 2021 году',
            'category_id' => 1,
            'isPrivate' =>  false,
        ],
    ];

    public static function getNews(){
        return static::$news;
    }

    public static function getNewsById($id){
            if (array_key_exists($id, static::getNews()))
                return static::getNews()[$id];
            else
                return [];
    }

    public static function getNewsByCategorySlug($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $news = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

}
