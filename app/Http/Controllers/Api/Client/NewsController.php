<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\NewsService;

class NewsController extends Controller
{
    public function __construct(private NewsService $newsService){}
}
