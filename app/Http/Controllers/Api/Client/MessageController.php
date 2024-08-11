<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\MessageService;

class MessageController extends Controller
{
    public function __construct(private MessageService $messageService){}


    public function storeClientMessage(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required|email",
            "mobile"=> "required",
            "subject" => "present|nullable",
            "body"=> "required",
        ]);
        $message = $this->messageService->storeClientMessage($request);
        return response()->json([
            "message" => $message,
        ], 200);
    }
}
