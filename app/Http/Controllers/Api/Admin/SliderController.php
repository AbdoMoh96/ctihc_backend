<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\SliderService;

class SliderController extends Controller
{
    public function __construct(private SliderService $sliderService){}
}
