<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{
    //


    public function lang_change(Request $request,$locale)
    {
\Log::info($locale);
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();


    }
}
