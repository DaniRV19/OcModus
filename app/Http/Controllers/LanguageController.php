<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $language = $request->input('language');
        App::setLocale($language);
        Cookie::queue(Cookie::make('language', $language,  43200)); 

        return redirect()->back();
    }
}
