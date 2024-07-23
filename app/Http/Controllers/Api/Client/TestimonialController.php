<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Client\TestimonialService;

class TestimonialController extends Controller
{
    public function __construct(private TestimonialService $testimonialService){}
}
