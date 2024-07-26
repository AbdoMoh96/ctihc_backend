<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\SliderService;

class SliderController extends Controller
{
    public function __construct(private SliderService $sliderService){}


    public function getParentSliders(){
        $sliders = $this->sliderService->getParentSliders();
        return response()->json($sliders, 200);
    }

    public function getSlidesUsingParentSlug(Request $request){
        $lang = $request->headers->get("Accept-Language");
        $sliders = $this->sliderService->getSlidesUsingParentSlug($request->input("slug"), $lang);
        return response()->json($sliders, 200);
    }

    public function uploadSlideImage(Request $request){
        $request->validate([
         "image"=> "required|mimes:jpg,png|max:5120",
        ]);

        if(!$request->hasFile("image")){
           return response()->json("image file is required");
        }

        $imagePath = $this->sliderService->uploadSlideImage($request->file('image'));

        return response()->json([
            'path'=> $imagePath,
        ],200);
    }
}
