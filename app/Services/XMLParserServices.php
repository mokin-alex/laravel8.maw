<?php


namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XMLParserServices
{
    public function saveNews($link) {
        $xml = XmlParser::load($link);


        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,category,pubDate,enclosure::url]']
        ]);



        foreach ($data['news'] as $news) {
            if (!$news['category']) {
                $categoryName = $data['title'];
            } else {
                $categoryName = $news['category'];
            }

            $category = Category::query()->firstOrCreate([
                'title' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'isPrivate' => false,
                'image' => $news['enclosure::url'],
                'category_id' => $category->id,
            ]);

        }
    }
}
