<?php

namespace App\Http\Controllers\Admin;

use Alkoumi\LaravelHijriDate\Hijri;
use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        Hijri::setLang(locale());
        $dataHijri = Hijri::Date('j F  Y');
        return view('admin.home.dashboard', compact("dataHijri"));
    }
    public function changeLang($lang)
    {
        if (in_array($lang, ['en', 'ar'])) {
            Session::put('locale', $lang); // ✅ Store in session
        }
        
        return redirect()->back();
    }
}
