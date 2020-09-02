<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Oglas;

class OglasiController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorije = Category::all();
        $latest = Oglas::orderBy('id', 'desc')->take(5)->get();
        $oglasi = Oglas::orderBy('created_at', 'desc')->paginate(10);
        return view('oglasi.index', ["oglasi"=>$oglasi, "kategorije"=>$kategorije, "latest"=>$latest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorije = Category::all();
        return view('oglasi.create')->with('kategorije', $kategorije);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => 'image|nullable|max:2048'
        ]);

        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('image')->storeAs('public/images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $oglas = new Oglas;
        $oglas->title = $request->input('title');
        $oglas->body = $request->input('body');
        $oglas->image = $filenameToStore;
        $oglas->user_id = auth()->user()->id;
        $oglas->cat_id = $request->input('category');
        $oglas->save();
        return redirect('/oglasi')->with('success', 'Oglas je postavljen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oglas = Oglas::findOrFail($id);
        return view('oglasi.show')->with('oglas', $oglas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oglas = Oglas::find($id);
        $kategorije = Category::all();
        if(auth()->user()->id != $oglas->user_id) {
            return redirect('/oglasi')->with('error', 'Unauthorized Page');
        }
        return view('oglasi.edit', ["oglas"=>$oglas, "kategorije"=>$kategorije]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => 'image|nullable|max:2048'
        ]);

        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('image')->storeAs('public/images', $filenameToStore);
        }

        $oglas = Oglas::find($id);
        $oglas->title = $request->input('title');
        $oglas->body = $request->input('body');
        if($request->hasFile('image')) {
            $oglas->image = $filenameToStore;
        }
        $oglas->user_id = auth()->user()->id;
        $oglas->cat_id = $request->input('category');
        $oglas->save();
        return redirect('/oglasi')->with('success', 'Oglas je ažuriran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oglas = Oglas::find($id);
        $oglas->delete();
        return redirect('/oglasi')->with('success', 'Oglas je uklonjen');
    }
}
