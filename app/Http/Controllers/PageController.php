<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page (Request $request, $slug) {
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('page', compact('page'));
    }
}
