<?php

namespace App\Http\Controllers\fronntend;

use App\Models\About;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Seminar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $Allbanner = Banner::where('status', '1')->latest()->limit(4)->get();
        $allabout = About::where('status', '1')->latest()->limit(1)->get();
        $allgallery = Gallery::where('status', '1')->latest()->limit(6)->get();
        $allseminar = Seminar::where('status', '1')->latest()->limit(4)->get();
        
        return view('Frontend.index' , compact('Allbanner' , 'allabout', 'allgallery', 'allseminar'));
    }
}
