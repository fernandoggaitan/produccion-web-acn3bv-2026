<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    
    public function switch(Request $request, string $locale):RedirectResponse
    {

        //Verificar si el idioma está disponible
        if( in_array($locale, ['en', 'es']) ){
            $request->session()->put('lang', $locale);
        }

        return redirect()->back();

    }

}
