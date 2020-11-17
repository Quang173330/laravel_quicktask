<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function changeLanguage($locale)
    {
        Session::put('language', $locale);

        return redirect()->back();
    }
}
