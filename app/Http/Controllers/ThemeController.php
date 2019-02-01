<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThemePhoto;
use App\Models\Theme;
use App\Models\Photo;

class ThemeController extends Controller
{
    public function index()
    {
      $theme = Theme::all();
      return view('guest/theme')->with('theme', $theme);
    }

    public function show($id)
    {
      $detail = ThemePhoto::with('theme','photo')->where('theme_id',$id)->get();
      $first = ThemePhoto::with('photo','theme')->where('theme_id',$id)->first();
      return view('guest/theme-detail')->with('detail', $detail)->with('theme',$first);
    }

    public function indexDesign()
    {
      $portofolio = Photo::paginate(9);
      return view('guest/design')->with('portofolio', $portofolio);
    }

    public function search(Request $request)
    {
      $portofolio = Photo::where('name', 'LIKE', '%'.$request->search.'%')->paginate(6);
      return view('guest/portofolio')->with('portofolio', $portofolio);
    }
}
