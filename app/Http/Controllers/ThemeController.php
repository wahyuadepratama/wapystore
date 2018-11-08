<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThemePhoto;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
      $theme = Theme::all();
      return view('guest/theme')->with('theme', $theme);
    }

    public function show($id)
    {
      $detail = ThemePhoto::where('theme_id',$id)->get();
      $first = ThemePhoto::first();
      return view('guest/theme-detail')->with('detail', $detail)->with('theme',$first);
    }
}
