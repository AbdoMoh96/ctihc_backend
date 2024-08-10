<?php

namespace App\Services\Client;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;

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

}
