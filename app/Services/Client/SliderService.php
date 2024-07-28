<?php

namespace App\Services\Client;
use Illuminate\Support\Facades\DB;


class SliderService {


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
}
