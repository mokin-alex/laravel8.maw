<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    //
    public function index() {
        $xml = XmlParser::load('https://lenta.ru/rss');

        dump($xml);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url]']
        ]);

        dd($data);

        foreach ($data['news'] as $news) {
            // Получить категорию (с id)
            // при необходимости добавить в БД
            // ПОлучить новость
            // при необходимости добавить с id Категории
            //HELP News::query()->firstOrCreate([])
        }
    }

}
