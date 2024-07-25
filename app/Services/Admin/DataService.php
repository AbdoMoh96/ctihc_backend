<?php

namespace App\Services\Admin;
use App\Models\Data;
use App\Traits\FileHandler;

class DataService {
use FileHandler;

   public function getDataGroups(){
     return Data::distinct()->select('group')->get()->pluck('group');
   }
}
