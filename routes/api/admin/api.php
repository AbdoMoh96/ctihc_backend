<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\DataController;

Route::controller(DataController::class)->prefix('data')->name('data.')->group(function () {
    Route::post('/getDataGroups', 'getDataGroups')->name('get_groups');
    Route::post('/getData', 'getData')->name('get_data');
    Route::post('/createData', 'createData')->name('create');
    Route::post('/updateDataValue', 'updateDataValue')->name('update_data_value');
    Route::post('/deleteData', 'deleteDataItem')->name('delete');
});
