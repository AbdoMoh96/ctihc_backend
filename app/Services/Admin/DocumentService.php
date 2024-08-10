<?php

namespace App\Services\Admin;
use App\Traits\FileHandler;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use App\Models\Lang\DocumentLang;

class DocumentService {
use FileHandler;


 public function getAllDocuments($lang, $data){
    $documents = DB::table('documents as d')
    ->leftJoin('documents_lang as dl', 'd.id', '=', 'dl.document_id')
    ->where('dl.lang', $lang)
    ->where('d.deleted_at', null)
    ->select('d.id','d.document_path', 'dl.title','dl.description')
    ->orderBy('n.id', $data->order ?? 'desc');

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

 public function uploadDocumentFile($file){
    return $this->fileUpload($file, 'documents');
 }


 public function createDocument($data){
    $supportedLanguages = config('app.locales');

    $document = new Document();
    $document->document_path = $data->file;
    $document->created_by = Auth()->guard()->user()->id;
    $document->save();

    foreach($supportedLanguages as $language){
        DocumentLang::create([
            'document_id' => $document->id,
            'lang' => $language,
            'title' => $data->{'title_'.$language},
            'description' => $data->{'description_'.$language},
            'created_by' => Auth()->guard()->user()->id
        ]);
    }

    $document->load('document_lang');
    return $document;
 }

 public function updateDocument($data){
    $supportedLanguages = config('app.locales');

    $document = Document::find($data->id);
    if($data->document_path) $document->document_path = $data->document_path;
    $document->created_by = Auth()->guard()->user()->id;
    $document->update();

    foreach($supportedLanguages as $language){
        DocumentLang::where([
          'document_id' => $document->id,
          'lang' => $language
        ])->update([
            'lang' => $language,
            'title' => $data->{'title_'.$language},
            'description' => $data->{'description_'.$language},
            'created_by' => Auth()->guard()->user()->id
        ]);
    }

    $document->load('document_lang');
    return $document;
 }

 public function deleteDocument($id){
   $document = Document::find($id);
   $document->delete();
   return $document;
 }

}
