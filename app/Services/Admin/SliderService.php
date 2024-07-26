<?php

namespace App\Services\Admin;
use App\Models\Slider;
use App\Models\Lang\SliderLang;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;

class SliderService {
use FileHandler;

  public function getParentSliders(){
    return Slider::where('is_parent', true)->get();
  }

  public function getSlidesUsingParentSlug($parentSlug, $lang){
    $data = DB::table('sliders as parent')
    ->where([
        'parent.slug' => $parentSlug,
        'parent.is_parent' => true,
        'parent.deleted_at' => null
    ])
    ->leftJoin('sliders as child', 'parent.id', '=', 'child.parent_id')
    ->leftJoin('sliders_lang as lang', 'child.id', '=', 'lang.slider_id')
    ->select('child.id','lang.lang', 'child.image', 'child.link', 'lang.title', 'lang.description', 'lang.btn_text')
    ->where('lang.lang', $lang)
    ->get();
    return $data;
  }

  public function uploadSlideImage($data){}

  public function createParentSlider($data){}


  public function createSlide($data){}


  public function updateSlide($data){}


  public function deleteSlide($data){}


  public function deleteParentSlider(){}
}
