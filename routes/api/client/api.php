<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Client\DataController;
use App\Http\Controllers\Api\Client\SliderController;

Route::controller(DataController::class)->prefix('data')->name('data.')->group(function () {
    Route::post('/getData', 'getData')->name('get_data');
});

Route::controller(SliderController::class)->prefix('slider')->name('slider.')->group(function () {
    Route::post('/getSlidesUsingParentSlug', 'getSlidesUsingParentSlug')->name('get_slides');
});
