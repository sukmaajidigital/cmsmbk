<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingMain;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.homepage', compact('landingmain', 'landingcontact', 'landingabout'));
    }

    public function about()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.about', compact('landingmain', 'landingcontact', 'landingabout'));
    }

    public function contact()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.contact', compact('landingmain', 'landingcontact', 'landingabout'));
    }
}
