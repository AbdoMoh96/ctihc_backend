<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\DocumentService;

class DocumentController extends Controller
{
   public function __construct(private DocumentService $documentService){}

   public function getAllDocuments(Request $request){

    if(!isLanguageSupported($request->header('Accept-Language'))){
        return response()->json("Language Not supported", 400);
    }

    $lang = $request->headers->get("Accept-Language");
    $documents = $this->documentService->getAllDocuments($lang, $request);
    return response()->json($documents, 200);
  }

  public function getDocument(Request $request){
    $request->validate([
        "id"=> "required|integer",
    ]);

    if(!isLanguageSupported($request->header('Accept-Language'))){
        return response()->json("Language Not supported", 400);
    }

    $lang = $request->headers->get("Accept-Language");
    $document = $this->documentService->getDocument($request->input('id'),$lang);
    return response()->json($document, 200);
  }

  public function uploadDocumentFile(Request $request){
    $request->validate([
        "file"=> "required|mimes:pdf,doc,docx|max:5120",
    ]);

    $file = $this->documentService->uploadDocumentFile($request->file('file'));
    return response()->json($file, 200);
  }

  public function createDocument(Request $request){
    $request->validate([
        "document_path" => "required",
        "title_en"=> "required",
        "title_ar"=> "required",
        "description_en"=> "required",
        "description_ar"=> "required",
    ]);
    $document = $this->documentService->createDocument($request);
    return response()->json($document, 200);
  }

  public function updateDocument(Request $request){
    $request->validate([
        "id" => "required",
        "document_path" => "sometimes",
        "title_en"=> "required",
        "title_ar"=> "required",
        "description_en"=> "required",
        "description_ar"=> "required",
    ]);
    $document = $this->documentService->updateDocument($request);
    return response()->json($document, 200);
  }

  public function deleteDocument(Request $request){
    $request->validate([
        "id" => "required|integer",
    ]);
    $document = $this->documentService->deleteDocument($request->input('id'));
    return response()->json($document, 200);
  }
}
