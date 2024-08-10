<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\PartnerService;

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

}
