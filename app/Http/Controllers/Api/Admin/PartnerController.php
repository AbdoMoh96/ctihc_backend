<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PartnerService;

class PartnerController extends Controller
{
    public function __construct(private PartnerService $partnerService){}

    
}
