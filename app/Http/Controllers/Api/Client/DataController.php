<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\DataService;

class DataController extends Controller
{
    public function __construct(private DataService $dataService){}


    public function getData(Request $request){
        $request->validate([
            "group" => "required"
        ]);

        $data = $this->dataService->getDataUsingGroup($request->input("group"));

        if(!$data){
            return response()->json([
                "message" => "something went wrong!!"
            ], 500);
        }

        return response()->json($data, 200);
       }
}
