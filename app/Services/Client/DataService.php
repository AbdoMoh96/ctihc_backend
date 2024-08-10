<?php

namespace App\Services\Client;
use App\Models\Data;

class DataService {

   public function getDataGroups(){
     return Data::distinct()->select('group')->get()->pluck('group');
   }

   public function getDataUsingGroup($group, $lang){
    $data = Data::where('group', $group)
    ->where('lang', $lang)
    ->orWhere('lang', null)
    ->get();

    $formattedData = $data->mapWithKeys(function ($dataItem) {
        return [$dataItem->key => $dataItem->value];
    });

    return $formattedData;
   }

}
