<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }
    public function contact() {
        $title = "KONTAKT";
        return view('pages.contact')->with('title', $title);
    }
}
