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
        $request->validate([
            "slug"=> "required",
        ]);

        if(!isLanguageSupported($request->header('Accept-Language'))){
            return response()->json("Language Not supported", 400);
        }

        $lang = $request->headers->get("Accept-Language");
        $sliders = $this->sliderService->getSlidesUsingParentSlug($request->input("slug"), $lang);
        return response()->json($sliders, 200);
    }

    public function uploadSlideImage(Request $request){
        $request->validate([
         "image"=> "required|mimes:jpg,png|max:5120",
        ]);

        $imagePath = $this->sliderService->uploadSlideImage($request->file('image'));

        return response()->json([
            'path'=> $imagePath,
        ],200);
    }

    public function createParentSlider(Request $request){
        $request->validate([
            "slug"=> "required",
        ]);
        $slider = $this->sliderService->createParentSlider($request);
        return response()->json($slider, 200);
    }

    public function createSlide(Request $request){
        $request->validate([
            "parent_id"=> "required",
            "image"=> "required",
        ]);
        $slide = $this->sliderService->createSlide($request);
        return response()->json($slide, 200);
    }
}
