<?php

namespace App\Http\Controllers;

use App\Category;
use App\Oglas;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAllCategories() {
        $categories = Category::get();

        return view('inc.sidebar', ["categories"=>$categories]);
    }

    public function show($id) {
        $oglasi = Oglas::where('cat_id', $id)->get();
        $category = Category::findOrFail($id);
        return view('kategorije.show', ["category"=>$category, "oglasi"=>$oglasi]);
    }
}
