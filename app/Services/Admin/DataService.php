<?php

namespace App\Services\Admin;
use App\Models\Data;
use App\Traits\FileHandler;

class DataService {
use FileHandler;

   public function getDataGroups(){
     return Data::distinct()->select('group')->get()->pluck('group');
   }

   public function getDataUsingGroup($group){
    $data = Data::where('group', $group)->get();

    $formattedData = $data->mapWithKeys(function ($dataItem) {
        return [$dataItem->key => $dataItem->value];
    });

    return $formattedData;
   }

   public function updateDataValue($data){
   return Data::where([
             'group' => $data->group,
             'key' => $data->key,
            ])->update([
               'value' => $data->value
            ]);
   }


}
