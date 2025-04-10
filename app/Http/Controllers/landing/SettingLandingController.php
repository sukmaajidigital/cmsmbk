<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingControllview;
use App\Models\landing\LandingMain;
use App\Models\landing\LandingProses;
use App\Models\landing\LandingVidio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingLandingController extends Controller
{
    public function main(): View
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('landingsetting.index', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function updateMain(Request $request)
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
    public function about(): View
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('landingsetting.about', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required',
            'imageabout' => 'nullable',
        ]);
        $landingabout = LandingAbout::first();
        if ($request->hasFile('imageabout')) {
            $logoPath = $request->file('imageabout')->store('imageabout', 'public');
            if ($landingabout && $landingabout->imageabout) {
                Storage::disk('public')->delete($landingabout->imageabout);
            }
            $validated['imageabout'] = $logoPath;
        }
        if ($landingabout) {
            $landingabout->update($validated);
        } else {
            LandingMain::create($validated);
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
    public function contact(): View
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('landingsetting.contact', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'required',
            'telepun' => 'required',
            'email' => 'required',
            'maps' => 'required',
        ]);
        $landingcontact = LandingContact::first();
        if ($landingcontact) {
            $landingcontact->update($validated);
        } else {
            LandingContact::create($validated);
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
    public function prosesandvidio(): View
    {
        $landingmain = LandingMain::first();
        $landingproses = LandingProses::all();
        $landingvidio = LandingVidio::first();
        return view('landingsetting.prosesandvidio', compact('landingmain', 'landingproses', 'landingvidio'));
    }
    public function createProses(): View
    {
        return view('landingsetting.proses.form');
    }
    public function storeProses(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'imageproses' => 'required',
        ]);
        $landingproses = LandingProses::first();
        if ($request->hasFile('imageproses')) {
            $imagePath = $request->file('imageproses')->store('imageproses', 'public');
            $validated['imageproses'] = $imagePath;
        }
        LandingProses::create($validated);
        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan!');
    }
    public function editProses(LandingProses $landingproses): View
    {
        return view('landingsetting.proses.edit', compact('bahan'));
    }
    public function updateProses(Request $request, LandingProses $landingproses): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'imageproses' => 'required',
        ]);
        if ($request->hasFile('imageproses')) {
            $imagePath = $request->file('imageproses')->store('imageproses', 'public');
            if ($landingproses && $landingproses->imageproses) {
                Storage::disk('public')->delete($landingproses->imageproses);
            }
            $validated['imageproses'] = $imagePath;
        }
        LandingProses::create($validated);
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
    public function destroyProses(LandingProses $landingproses)
    {
        $landingproses = LandingProses::first();
        if ($landingproses && $landingproses->imageproses) {
            Storage::disk('public')->delete($landingproses->imageproses);
        }
        $landingproses->delete();
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
    public function updateVidio(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'vidio' => 'required',
        ]);
        $landingvidio = LandingVidio::first();
        if ($request->hasFile('vidio')) {
            $vidioPath = $request->file('vidio')->store('vidio', 'public');
            if ($landingvidio && $landingvidio->vidio) {
                Storage::disk('public')->delete($landingvidio->vidio);
            }
            $validated['vidio'] = $vidioPath;
        }
        if ($landingvidio) {
            $landingvidio->update($validated);
        } else {
            LandingVidio::create($validated);
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
    public function controllview(): View
    {
        $landingmain = LandingMain::first();
        $landingcontrollview = LandingControllview::first();
        return view('landingsetting.controllview', compact('landingmain', 'landingcontrollview'));
    }
    public function updateControllview(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'hero_tagline' => 'required',
            'hero_subtagline' => 'required',
            'hero_button' => 'required',
            'hero_image' => 'required',
            'proses_title' => 'required',
            'proses_subtitle' => 'required',
            'produk_title' => 'required',
            'produk_subtitle' => 'required',
        ]);
        $landingcontrollview = LandingControllview::first();
        if ($request->hasFile('hero_image')) {
            $heroimagePath = $request->file('hero_image')->store('hero_image', 'public');
            if ($landingcontrollview && $landingcontrollview->hero_image) {
                Storage::disk('public')->delete($landingcontrollview->hero_image);
            }
            $validated['hero_image'] = $heroimagePath;
        }
        if ($landingcontrollview) {
            $landingcontrollview->update($validated);
        } else {
            LandingControllview::create($validated);
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
