<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\MessageService;

class MessageController extends Controller
{
    public function __construct(private MessageService $messageService){}
}
