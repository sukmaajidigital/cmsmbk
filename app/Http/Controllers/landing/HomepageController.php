<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingControllview;
use App\Models\landing\LandingMain;
use App\Models\landing\LandingProses;
use App\Models\landing\LandingVidio;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        $landingvidio = LandingVidio::first();
        $landingproses = LandingProses::all();
        $landingcontrollview = LandingControllview::all();
        return view('page_landing.homepage', compact('landingmain', 'landingcontact', 'landingabout', 'landingvidio', 'landingproses', 'landingcontrollview'));
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
    public function test()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.test', compact('landingmain', 'landingcontact', 'landingabout'));
    }
}
