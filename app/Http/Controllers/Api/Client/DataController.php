<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\DataService;

class DataController extends Controller
{
   public function __construct (private DataService $dataService){}

   public function getDataGroups(){
       $data = $this->dataService->getDataGroups();

       if(!$data){
        return response()->json([
            "message" => "something went wrong!!"
        ], 500);
      }

       return response()->json($data, 200);
   }

   public function getData(Request $request){
    $request->validate([
        "group" => "required"
    ]);

    $lang = $request->headers->get("Accept-Language");

    if(!isLanguageSupported($lang)){
        return response()->json("Language Not supported", 400);
    }

    $data = $this->dataService->getDataUsingGroup($request->input("group"), $lang);

    if(!$data){
        return response()->json([
            "message" => "something went wrong!!"
        ], 500);
    }

    return response()->json($data, 200);
   }

}
