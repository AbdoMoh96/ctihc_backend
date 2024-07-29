<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\NewsService;

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

  public function uploadNewsThumbnail(Request $request){
    $request->validate([
        "thumbnail"=> "required|mimes:jpg,png|max:5120",
    ]);

    $thumbnail = $this->newsService->uploadNewsThumbnail($request->file('thumbnail'));
    return response()->json($thumbnail, 200);
  }

  public function createNewsItem(Request $request){
    $request->validate([
        "thumbnail"=> "required",
        "title_en"=> "required",
        "title_ar"=> "required",
        "description_en"=> "required",
        "description_ar"=> "required",
        "body_en"=> "required",
        "body_ar"=> "required",
    ]);
    $news = $this->newsService->createNewsItem($request);
    return response()->json($news, 200);
  }

  public function updateNewsItem(Request $request){
    $request->validate([
        "id" => "required",
        "title_en"=> "required",
        "title_ar"=> "required",
        "description_en"=> "required",
        "description_ar"=> "required",
        "body_en"=> "required",
        "body_ar"=> "required",
    ]);
    $news = $this->newsService->updateNewsItem($request);
    return response()->json($news, 200);
  }

  public function deleteNewsItem(Request $request){
    $request->validate([
        "id" => "required",
    ]);
    $news = $this->newsService->deleteNewsItem($request->input('id'));
    return response()->json($news, 200);
  }
}
