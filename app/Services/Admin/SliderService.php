<?php

namespace App\Services\Admin;
use App\Models\Slider;
use App\Models\Lang\SliderLang;
use App\Traits\FileHandler;

class SliderService {
use FileHandler;

  public function getParentSliders(){
    return Slider::where('is_parent', true)->get();
  }

  public function getSlidesUsingParentSlug($parentSlug, $lang){
    $parent = Slider::with(['slides' => function($query) use ($lang) {
        $query->with("slide_$lang");
    }])->where('slug', $parentSlug)->first();

    if (!$parent) {
        return collect();
    }

    $slides = $parent->slides->map(function($slide) use ($lang) {
        $slide->data = $slide->{"slide_$lang"}[0];
        unset($slide->{"slide_$lang"});
        return $slide;
    });

    return $slides;
  }

  public function uploadSlideImage($data){}

  public function createParentSlider($data){}


  public function createSlide($data){}


  public function updateSlide($data){}


  public function deleteSlide($data){}


  public function deleteParentSlider(){}
}
