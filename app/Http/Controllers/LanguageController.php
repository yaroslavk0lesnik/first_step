<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {

        if (!in_array($locale, ['en', 'ua'])) {
            abort(400);
        }
        Session::put('locale', $locale);
        session()->save();

        App::setLocale($locale);

        return redirect()->back();
    }
}
