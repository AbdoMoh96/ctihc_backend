<?php

namespace App\Services\Admin;
use App\Models\Data;
use App\Traits\FileHandler;

class DataService {
use FileHandler;

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

   public function createData($data){
     $dataItem = new Data();
     $dataItem->group = $data->group;
     $dataItem->lang = $data->lang;
     $dataItem->key = $data->key;
     $dataItem->value = $data->value;
     $dataItem->save();
     return $dataItem;
   }

   public function updateDataValue($data){
   return Data::where([
             'group' => $data->group,
             'lang' => $data->lang,
             'key' => $data->key,
            ])->update([
               'value' => $data->value
        ]);
   }

   public function dataItemDelete($data){

    return Data::where([
        'group' => $data->group,
        'lang' => $data->lang,
        'key' => $data->key,
       ])->delete();
   }


}
