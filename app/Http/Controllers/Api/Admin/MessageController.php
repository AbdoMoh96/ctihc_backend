<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\MessageService;

class MessageController extends Controller
{
    public function __construct(private MessageService $messageService){}
}
