<?php

namespace App\Services\Admin;
use App\Models\Slider;
use App\Models\Lang\SliderLang;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    ->where("child.deleted_at", null)
    ->get();
    return $data;
  }

  public function uploadSlideImage($image){
    return $this->fileUpload($image, 'slides');
  }

  public function createParentSlider($data){
    $parent = new Slider();
    $parent->slug = $data->slug;
    $parent->is_parent = true;
    $parent->created_by = Auth()->guard('admin')->user()->id;
    $parent->save();
    return $parent;
  }


  public function createSlide($data){
    $supportedLanguages = config('app.locales');

    $slide = new Slider();
    $slide->image = $data->image;
    $slide->link =  $data->link ?? null;
    $slide->is_parent = false;
    $slide->created_by = Auth()->guard('admin')->user()->id;
    $slide->parent_id = $data->parent_id;
    $slide->save();

    foreach($supportedLanguages as $language){
        SliderLang::create([
           'slider_id' => $slide->id,
           'lang' => $language,
           'title' => $data->{'title_'.$language},
           'description' => $data->{'description_'.$language},
           'created_by' => Auth()->guard('admin')->user()->id,
           'btn_text' => $data->{'btn_text_'.$language},
        ]);
    }

    $slide->load('slide_lang');
    return $slide;
  }

  public function getSlideById($id){
    $slide = Slider::where([
        'id' => $id,
        'is_parent' => false
    ])->firstOrFail();
    $slide->load('slide_lang');
    return $slide;
  }

  public function updateSlide($data){
    $supportedLanguages = config('app.locales');

    $slide = Slider::findOrFail($data->id);
    if($slide->image) $slide->image = $data->image;
    $slide->link = $data->link ?? null;
    $slide->update();

    foreach($supportedLanguages as $language){
        SliderLang::where([
            'slider_id' => $slide->id,
            'lang' => $language,
        ])->update([
            'slider_id' => $slide->id,
            'lang' => $language,
            'title' => $data->{'title_'.$language},
            'description' => $data->{'description_'.$language},
            'created_by' => Auth()->guard('admin')->user()->id,
            'btn_text' => $data->{'btn_text_'.$language},
         ]);
    }

    $slide->load('slide_lang');
    return $slide;
}


  public function deleteSlide($id){
    $slide = Slider::where([
        'id' => $id,
        'is_parent' => false
    ])->delete();
    return $slide;
  }


  public function deleteParentSlider($id){
    $slide = Slider::where([
        'id' => $id,
        'is_parent' => true
    ])->delete();
    return $slide;
  }
}
