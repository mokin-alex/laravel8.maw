<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\XMLParserServices;

class ParserController extends Controller
{
    public function index(XMLParserServices $parserServices)
    {
        $rssLinks = [
            'https://lenta.ru/rss/news',
            'https://news.yandex.ru/auto.rss',

        ];

        foreach ($rssLinks as $rssLink) {
            $parserServices->saveNews($rssLink);
            //NewsParsing::dispatch($rssLink);
        }

        return redirect()->route('admin.news.index');

    }

}
