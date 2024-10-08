<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\NewsService;

class NewsController extends Controller
{
   public function __construct(private NewsService $newsService){}


   public function getAllNews(Request $request){

    if(!isLanguageSupported($request->header('Accept-Language'))){
        return response()->json("Language Not supported", 400);
    }

    $lang = $request->headers->get("Accept-Language");
    $news = $this->newsService->getAllNews($lang, $request);
    return response()->json($news, 200);
  }

  public function getNewsItem(Request $request){
    $request->validate([
        "id"=> "required|integer",
    ]);

    if(!isLanguageSupported($request->header('Accept-Language'))){
        return response()->json("Language Not supported", 400);
    }

    $lang = $request->headers->get("Accept-Language");
    $news = $this->newsService->getNewsItem($request->input('id'),$lang);
    return response()->json($news, 200);
  }

  public function getNewsItemBySlug(Request $request){
    $request->validate([
        "slug"=> "required",
    ]);

    if(!isLanguageSupported($request->header('Accept-Language'))){
        return response()->json("Language Not supported", 400);
    }

    $lang = $request->headers->get("Accept-Language");
    $news = $this->newsService->getNewsItemBySlug($request->input('slug'),$lang);
    return response()->json($news, 200);
  }
  
}
