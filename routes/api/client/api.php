<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Client\DataController;
use App\Http\Controllers\Api\Client\SliderController;
use App\Http\Controllers\Api\Client\NewsController;
use App\Http\Controllers\Api\Client\PartnerController;
use App\Http\Controllers\Api\Client\DocumentController;

Route::controller(DataController::class)->prefix('data')->name('data.')->group(function () {
    Route::post('/getDataGroups', 'getDataGroups')->name('get_groups');
    Route::post('/getData', 'getData')->name('get_data');
});


Route::controller(SliderController::class)->prefix('slider')->name('slider.')->group(function () {
    Route::post('/getParentSliders', 'getParentSliders')->name('get_parents');
    Route::post('/getSlidesUsingParentSlug', 'getSlidesUsingParentSlug')->name('get_slides');
});

Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
    Route::post('/getAllNews', 'getAllNews')->name('all');
    Route::post('/getNewsItem', 'getNewsItem')->name('get_item');
    Route::post('/getNewsItemBySlug', 'getNewsItemBySlug')->name('get_item_slug');
});


Route::controller(PartnerController::class)->prefix('partners')->name('partners.')->group(function () {
    Route::post('/getAllPartners', 'getAllPartners')->name('all');
    Route::post('/getPartner', 'getPartner')->name('get_item');
    Route::post('/getPartnerBySlug', 'getPartnerBySlug')->name('get_item_slug');
});

Route::controller(DocumentController::class)->prefix('documents')->name('documents.')->group(function () {
    Route::post('/getAllDocuments', 'getAllDocuments')->name('all');
    Route::post('/getDocument', 'getDocument')->name('get_item');
});
