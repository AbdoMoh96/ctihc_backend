<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\DataService;

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

   public function createData(Request $request){
    $request->validate([
        "group" => "required",
        "lang" => "present|nullable",
        "key" => "required",
        "value" => "required"
    ]);
    $data = $this->dataService->createData($request);

    if(!$data){
        return response()->json([
            "message" => "something went wrong!!"
        ], 500);
    }

     return response()->json([
        "message" => "data created successfully!!",
        "data" => $data
    ], 200);
   }

   public function updateDataValue(Request $request){
    $request->validate([
        "group" => "required",
        "lang" => "present|nullable",
        "key" => "required",
        "value" => "required"
    ]);

    $data = $this->dataService->updateDataValue($request);

    if(!$data){
        return response()->json([
            "message" => "something went wrong!!"
        ], 500);
    }

    return response()->json([
        "message" => "value updated successfully!!"
    ], 200);
   }

   public function deleteDataItem(Request $request){
    $request->validate([
        "group" => "required",
        "lang" => "present|nullable",
        "key" => "required"
    ]);

    $data = $this->dataService->dataItemDelete($request);

    if(!$data){
        return response()->json([
            "message" => "something went wrong!!"
        ], 500);
    }

    return response()->json([
        "message" => "value deleted successfully!!"
    ], 200);
   }
}
