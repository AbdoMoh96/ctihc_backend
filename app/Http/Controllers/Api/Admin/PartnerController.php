<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PartnerService;

class PartnerController extends Controller
{
    public function __construct(private PartnerService $partnerService){}


    public function getAllPartners(Request $request){

        if(!isLanguageSupported($request->header('Accept-Language'))){
            return response()->json("Language Not supported", 400);
        }

        $lang = $request->headers->get("Accept-Language");
        $partners = $this->partnerService->getAllPartners($lang, $request);
        return response()->json($partners, 200);
      }

      public function getPartner(Request $request){
        $request->validate([
            "id"=> "required|integer",
        ]);

        if(!isLanguageSupported($request->header('Accept-Language'))){
            return response()->json("Language Not supported", 400);
        }

        $lang = $request->headers->get("Accept-Language");
        $partner = $this->partnerService->getPartner($request->input('id'),$lang);
        return response()->json($partner, 200);
      }


      public function getPartnerBySlug(Request $request){
        $request->validate([
            "slug"=> "required",
        ]);

        if(!isLanguageSupported($request->header('Accept-Language'))){
            return response()->json("Language Not supported", 400);
        }

        $lang = $request->headers->get("Accept-Language");
        $partner = $this->partnerService->getPartnerBySlug($request->input('slug'),$lang);
        return response()->json($partner, 200);
      }

      public function uploadPartnerImage(Request $request){
        $request->validate([
            "image"=> "required|mimes:jpg,png|max:5120",
        ]);

        $image = $this->partnerService->uploadPartnerImage($request->file('image'));
        return response()->json($image, 200);
      }


      public function createPartner(Request $request){
        $request->validate([
            "image"=> "required",
            "title_en"=> "required",
            "title_ar"=> "required",
            "description_en"=> "required",
            "description_ar"=> "required",
            "body_en"=> "required",
            "body_ar"=> "required",
            "btn_text_en" => "present|nullable",
            "btn_text_ar" => "present|nullable",
        ]);
        $partner = $this->partnerService->createPartner($request);
        return response()->json($partner, 200);
      }


      public function updatePartner(Request $request){
        $request->validate([
            "id" => "required",
            "title_en"=> "required",
            "title_ar"=> "required",
            "description_en"=> "required",
            "description_ar"=> "required",
            "body_en"=> "required",
            "body_ar"=> "required",
            "btn_text_en" => "present|nullable",
            "btn_text_ar" => "present|nullable",
        ]);
        $partner = $this->partnerService->updatePartner($request);
        return response()->json($partner, 200);
      }

      public function deletePartner(Request $request){
        $request->validate([
            "id" => "required",
        ]);
        $news = $this->partnerService->deletePartner($request->input('id'));
        return response()->json($news, 200);
      }
}
