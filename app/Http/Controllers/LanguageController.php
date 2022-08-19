<?php

  namespace App\Http\Controllers;

  use Carbon\Carbon;
  use Illuminate\Http\Request;

  class LanguageController extends Controller
  {
    //
    public function swap($locale)
    {
      // available language in template array
      $availLocale = ['en' => 'en', 'id' => 'id'];
      // check for existing language
      if (array_key_exists($locale, $availLocale)) {
        config(['app.locale' => 'id'], 'id');
        Carbon::setLocale($locale);
        session()->put('locale', $locale);
      }
      return redirect()->back();
    }
  }
