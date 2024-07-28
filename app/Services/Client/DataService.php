<?php

namespace App\Services\Client;
use App\Models\Data;

class DataService {

    public function getDataUsingGroup($group){
        $data = Data::where('group', $group)->get();

        $formattedData = $data->mapWithKeys(function ($dataItem) {
            return [$dataItem->key => $dataItem->value];
        });

        return $formattedData;
       }
}
