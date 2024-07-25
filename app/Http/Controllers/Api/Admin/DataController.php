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
       return response()->json($data, 200);
   }

   public function getData(Request $request){
    $request->validate([
        "group" => "required"
    ]);

    $data = $this->dataService->getDataUsingGroup($request->input("group"));
    return response()->json($data, 200);
   }

   public function updateDataValue(Request $request){
    $request->validate([
        "group" => "required",
        "key" => "required",
        "value" => "required"
    ]);

    $data = $this->dataService->updateDataValue($request);
    return response()->json([
        "message" => "value updated successfully!!"
    ], 200);
   }
}
