<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\TestimonialService;

class TestimonialController extends Controller
{
   public function __construct(private TestimonialService $testimonialService){}
}
