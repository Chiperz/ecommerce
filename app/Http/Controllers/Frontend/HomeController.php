<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::where('status', 1)->orderBy('serial', 'ASC')->get();
        return view('frontend.home.home', compact('slider'));
    }
}
