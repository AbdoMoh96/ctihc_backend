<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\SliderService;

class SliderController extends Controller
{
    public function __construct(private SliderService $sliderService){}

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
}
