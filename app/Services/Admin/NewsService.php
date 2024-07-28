<?php

namespace App\Services\Admin;

use App\Models\Lang\NewsLang;
use App\Models\News;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsService {
use FileHandler;


 public function getAllNews($lang, $page){
    $news = DB::table('news as n')
    ->leftJoin('news_lang as nl', 'n.id', '=', 'nl.news_id')
    ->where('nl.lang', $lang)
    ->where('n.deleted_at', null)
    ->select('n.id','n.slug','n.thumbnail','nl.title','nl.description','nl.body');

    if($page){
        return $news->paginate(8, $page);
    }

    return $news->get();
 }

 public function getNewsItem($id, $lang){
   $news = DB::table('news as n')
   ->leftJoin('news_lang as nl', 'n.id', '=', 'nl.news_id')
   ->where('nl.lang', $lang)
   ->where('n.id', $id)
   ->where('deleted_at', null)
   ->select('n.id','n.slug','n.thumbnail','nl.title','nl.description','nl.body')
   ->first();
   return $news;
 }

 public function getNewsItemBySlug($slug, $lang){
    $news = DB::table('news as n')
   ->leftJoin('news_lang as nl', 'n.id', '=', 'nl.news_id')
   ->where('nl.lang', $lang)
   ->where('n.slug', $slug)
   ->where('deleted_at', null)
   ->select('n.id','n.slug','n.thumbnail','nl.title','nl.description','nl.body')
   ->first();
   return $news;
 }

 public function uploadNewsThumbnail($image){
    return $this->fileUpload($image, 'news');
 }


 public function createNewsItem($data){
    $supportedLanguages = config('app.locales');

    $news = new News();
    $news->thumbnail = $data->thumbnail;
    $news->slug = Str::slug($data->title_en, '-');
    $news->created_by = Auth()->guard()->user()->id;
    $news->save();

    foreach($supportedLanguages as $language){
        NewsLang::create([
            'news_id' => $news->id,
            'lang' => $language,
            'title' => $data->{'title_'.$language},
            'description' => $data->{'description_'.$language},
            'body' => $data->{'body_'.$language},
            'created_by' => Auth()->guard()->user()->id
        ]);
    }

    $news->load('news_lang');
    return $news;
 }

 public function updateNewsItem($data){
    $supportedLanguages = config('app.locales');

    $news = News::find($data->id);
    $news->thumbnail = $data->thumbnail;
    $news->slug = Str::slug($data->title_en, '-');
    $news->created_by = Auth()->guard()->user()->id;
    $news->update();

    foreach($supportedLanguages as $language){
        NewsLang::where([
          'news_id' => $news->id,
          'lang' => $language
        ])->update([
            'lang' => $language,
            'title' => $data->{'title_'.$language},
            'description' => $data->{'description_'.$language},
            'body' => $data->{'body_'.$language},
            'created_by' => Auth()->guard()->user()->id
        ]);
    }

    $news->load('news_lang');
    return $news;
 }

 public function deleteNewsItem($id){
   $news = News::find($id);
   $news->delete();
   return $news;
 }

}
