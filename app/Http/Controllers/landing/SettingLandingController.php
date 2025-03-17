<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingLandingController extends Controller
{
    public function setting(): View
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('landingsetting.index', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'shortname' => 'required',
            'longname' => 'required',
            'data_theme' => 'required',
            'logo' => 'nullable',
            'icon' => 'nullable',
        ]);
        $landingmain = LandingMain::first();
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
            if ($landingmain && $landingmain->logo) {
                Storage::disk('public')->delete($landingmain->logo);
            }
            $validated['logo'] = $logoPath;
        }
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public');
            if ($landingmain && $landingmain->icon) {
                Storage::disk('public')->delete($landingmain->icon);
            }
            $validated['icon'] = $iconPath;
        }
        if ($landingmain) {
            $landingmain->update($validated);
        } else {
            LandingMain::create($validated);
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
