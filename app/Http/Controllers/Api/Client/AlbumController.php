<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\AlbumService;

class AlbumController extends Controller
{
   public function __construct(private AlbumService $albumService){}
}
