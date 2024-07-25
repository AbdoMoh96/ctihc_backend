<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\PartnerService;

class PartnerController extends Controller
{
    public function __construct(private PartnerService $partnerService){}
}
