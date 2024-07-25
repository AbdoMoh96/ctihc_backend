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
}
