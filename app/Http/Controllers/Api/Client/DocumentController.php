<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\DocumentService;

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

}
