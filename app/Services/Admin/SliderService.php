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
    $parent = Slider::where('slug', $parentSlug)->first();
    $slides = Slider::where('parent_id', $parent->id)->get();
    $slides->load("slide_$lang");
    return $slides;
  }

  public function uploadSlideImage($data){}

  public function createParentSlider($data){}


  public function createSlide($data){}


  public function updateSlide($data){}


  public function deleteSlide($data){}


  public function deleteParentSlider(){}
}
