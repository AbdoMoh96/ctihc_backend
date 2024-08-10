<?php

namespace App\Services\Client;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;

class NewsService {
use FileHandler;


 public function getAllNews($lang, $data){
    $news = DB::table('news as n')
    ->leftJoin('news_lang as nl', 'n.id', '=', 'nl.news_id')
    ->where('nl.lang', $lang)
    ->where('n.deleted_at', null)
    ->select('n.id','n.slug','n.thumbnail','nl.title','nl.description','nl.body')
    ->orderBy('n.id', $data->order ?? 'desc');

    if($data->filter){
        $news->whereAny(
            [
                'nl.title',
                'nl.description',
            ],
            'LIKE',
            "%$data->filter%");
    }

    if($data->limit){
        $news->limit($data->limit);
    }

    if($data->page){
        return $news->paginate(8, $data->page);
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

}
