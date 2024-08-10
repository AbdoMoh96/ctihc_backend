<?php

namespace App\Services\Admin;
use App\Traits\FileHandler;
use App\Models\Partner;
use App\Models\Lang\PartnerLang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartnerService
{
  use FileHandler;

  public function getAllPartners($lang, $data){
    $partners = DB::table('partners as p')
    ->leftJoin('partners_lang as pl', 'p.id', '=', 'pl.partner_id')
    ->where('pl.lang', $lang)
    ->where('p.deleted_at', null)
    ->select('p.id','p.slug','p.image','pl.title','pl.description')
    ->orderBy('p.id', $data->order ?? 'desc');

    if($data->filter){
        $partners->whereAny(
            [
                'pl.title',
                'pl.description'
            ],
            'LIKE',
            "%$data->filter%");
    }

    if($data->limit){
        $partners->limit($data->limit);
    }

    if($data->page){
        return $partners->paginate(8, $data->page);
    }

    return $partners->get();
 }

 public function getPartner($id, $lang){
   $partner = DB::table('partners as p')
   ->leftJoin('partners_lang as pl', 'p.id', '=', 'pl.partner_id')
   ->where('pl.lang', $lang)
   ->where('p.id', $id)
   ->where('deleted_at', null)
   ->select('p.id','p.slug','p.image','pl.title','pl.description')
   ->first();
   return $partner;
 }

 public function getPartnerBySlug($slug, $lang){
    $news = DB::table('partners as p')
   ->leftJoin('partners_lang as pl', 'p.id', '=', 'pl.partner_id')
   ->where('pl.lang', $lang)
   ->where('p.slug', $slug)
   ->where('deleted_at', null)
   ->select('p.id','p.slug','p.image','pl.title','pl.description')
   ->first();
   return $news;
 }

 public function uploadPartnerImage($thumbnail){
    return $this->fileUpload($thumbnail, 'partners');
 }

 public function createPartner($data){
    $supportedLanguages = config('app.locales');

    $partner = new Partner();
    $partner->slug = Str::slug($data->title_en, '-');
    $partner->image = $data->image;
    $partner->created_by = Auth()->guard('admin')->user()->id;
    $partner->save();

    foreach($supportedLanguages as $language){
        PartnerLang::create([
           'partner_id' => $partner->id,
           'lang' => $language,
           'title' => $data->{'title_'.$language},
           'description' => $data->{'description_'.$language},
           'btn_text' => $data->{'btn_text_'.$language},
           'created_by' => Auth()->guard('admin')->user()->id,
        ]);
    }

    $partner->load('partner_lang');
    return $partner;
 }

 public function updatePartner($data){
    $supportedLanguages = config('app.locales');

    $partner = Partner::findOrFail($data->id);
    $partner->slug = Str::slug($data->title_en, '-');
    if($data->image) $partner->image = $data->image;
    $partner->created_by = Auth()->guard('admin')->user()->id;
    $partner->update();

    foreach($supportedLanguages as $language){
        PartnerLang::where([
           'partner_id' => $partner->id,
           'lang' => $language,
        ])->update([
            'partner_id' => $partner->id,
            'lang' => $language,
            'title' => $data->{'title_'.$language},
            'description' => $data->{'description_'.$language},
            'btn_text' => $data->{'btn_text_'.$language},
            'created_by' => Auth()->guard('admin')->user()->id,
         ]);
    }

    $partner->load('partner_lang');
    return $partner;

 }

 public function deletePartner($id){
    $partner = Partner::findOrFail($id);
    $partner->delete();
    return $partner;
 }
}
