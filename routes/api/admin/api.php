<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\DataController;
use App\Http\Controllers\Api\Admin\SliderController;

Route::controller(DataController::class)->prefix('data')->name('data.')->group(function () {
    Route::post('/getDataGroups', 'getDataGroups')->name('get_groups');
    Route::post('/getData', 'getData')->name('get_data');
    Route::post('/createData', 'createData')->name('create');
    Route::post('/updateDataValue', 'updateDataValue')->name('update_data_value');
    Route::post('/deleteData', 'deleteDataItem')->name('delete');
});


Route::controller(SliderController::class)->prefix('slider')->name('slider.')->group(function () {
    Route::post('/getParentSliders', 'getParentSliders')->name('get_parents');
    Route::post('/getSlidesUsingParentSlug', 'getSlidesUsingParentSlug')->name('get_slides');
    Route::post('/uploadSlideImage', 'uploadSlideImage')->name('upload_image');
    Route::post('/createParentSlider', 'createParentSlider')->name('create.slider');
    Route::post('/createSlide', 'createSlide')->name('create.slide');
    Route::post('/getSlideById', 'getSlideById')->name('slide.find');
    Route::post('/updateSlide', 'updateSlide')->name('slide.update');
    Route::post('/deleteSlide', 'deleteSlide')->name('slide.delete');
    Route::post('/deleteParentSlider', 'deleteParentSlider')->name('slider.delete');
});
