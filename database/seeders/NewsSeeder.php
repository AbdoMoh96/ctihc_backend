<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Lang\NewsLang;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsItem1 = new News();
        $newsItem1->thumbnail = 'news1.png';
        $newsItem1->slug = 'news-item-1';
        $newsItem1->created_by = 1;
        $newsItem1->save();

        NewsLang::create([
            'news_id' => $newsItem1->id,
            'lang' => 'en',
            'title' => 'news1 title en',
            'description' => 'news1 description en',
            'body' => 'news1 body en',
            'created_by' => 1
        ]);
        NewsLang::create([
            'news_id' => $newsItem1->id,
            'lang' => 'ar',
            'title' => 'news1 title ar',
            'description' => 'news1 description ar',
            'body' => 'news1 body ar',
            'created_by' => 1
        ]);

        $newsItem2 = new News();
        $newsItem2->thumbnail = 'news2.png';
        $newsItem2->slug = 'news-item-2';
        $newsItem2->created_by = 1;
        $newsItem2->save();

        NewsLang::create([
            'news_id' => $newsItem2->id,
            'lang' => 'en',
            'title' => 'news2 title en',
            'description' => 'news2 description en',
            'body' => 'news2 body en',
            'created_by' => 1
        ]);
        NewsLang::create([
            'news_id' => $newsItem2->id,
            'lang' => 'ar',
            'title' => 'news2 title ar',
            'description' => 'news2 description ar',
            'body' => 'news2 body ar',
            'created_by' => 1
        ]);

        $newsItem3 = new News();
        $newsItem3->thumbnail = 'news3.png';
        $newsItem3->slug = 'news-item-3';
        $newsItem3->created_by = 1;
        $newsItem3->save();

        NewsLang::create([
            'news_id' => $newsItem3->id,
            'lang' => 'en',
            'title' => 'news3 title en',
            'description' => 'news3 description en',
            'body' => 'news3 body en',
            'created_by' => 1
        ]);
        NewsLang::create([
            'news_id' => $newsItem3->id,
            'lang' => 'ar',
            'title' => 'news3 title ar',
            'description' => 'news3 description ar',
            'body' => 'news3 body ar',
            'created_by' => 1
        ]);

        $newsItem4 = new News();
        $newsItem4->thumbnail = 'news4.png';
        $newsItem4->slug = 'news-item-4';
        $newsItem4->created_by = 1;
        $newsItem4->save();

        NewsLang::create([
            'news_id' => $newsItem4->id,
            'lang' => 'en',
            'title' => 'news4 title en',
            'description' => 'news4 description en',
            'body' => 'news4 body en',
            'created_by' => 1
        ]);
        NewsLang::create([
            'news_id' => $newsItem4->id,
            'lang' => 'ar',
            'title' => 'news4 title ar',
            'description' => 'news4 description ar',
            'body' => 'news4 body ar',
            'created_by' => 1
        ]);
    }
}
