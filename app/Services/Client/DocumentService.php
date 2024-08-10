<?php

namespace App\Services\Client;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;

class DocumentService {
use FileHandler;


 public function getAllDocuments($lang, $data){
    $documents = DB::table('documents as d')
    ->leftJoin('documents_lang as dl', 'd.id', '=', 'dl.document_id')
    ->where('dl.lang', $lang)
    ->where('d.deleted_at', null)
    ->select('d.id','d.document_path', 'dl.title','dl.description')
    ->orderBy('d.id', $data->order ?? 'desc');

    if($data->filter){
        $documents->whereAny(
            [
                'dl.title',
                'dl.description',
            ],
            'LIKE',
            "%$data->filter%");
    }

    if($data->limit){
        $documents->limit($data->limit);
    }

    if($data->page){
        return $documents->paginate(8, $data->page);
    }

    return $documents->get();
 }

 public function getDocument($id, $lang){
   $document = DB::table('documents as d')
   ->leftJoin('documents_lang as dl', 'd.id', '=', 'dl.document_id')
   ->where('dl.lang', $lang)
   ->where('d.id', $id)
   ->where('d.deleted_at', null)
   ->select('d.id','d.document_path', 'dl.title','dl.description')
   ->first();
   return $document;
 }

}
