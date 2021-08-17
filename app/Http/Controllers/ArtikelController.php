<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::all();
//        return view('show_artikels')->with('datas',$artikels);
//        return view('show_artikels',compact('artikels'));
        return view('show_artikels',['datas' => $artikels]);
    }

    public function showUpdateForm($id){
        $artikel = Artikel::where('id','=',$id)->first();
        return view('update_artikel_form',compact('artikel'));
    }

    public function delete($id){
//        Artikel::destroy($id);
        $artikel = Artikel::find($id);
        Storage::delete('/public/'.$artikel->image);

        $artikel->delete();
        return redirect(route('home'))->with('success','Your article has been deleted');
    }

    public function update(ArtikelRequest $request,$id){
        $artikelWillUpdate = Artikel::find($id);

        Storage::delete('/public/'.$artikelWillUpdate->image);

        $path = $request->file('image')->store('public/artikel_images');
        $path = substr($path,strlen('public/'));

        $artikelWillUpdate->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $path
        ]);
        return redirect(route('home'))->with('success','Your artikel has been updated');
    }

    public function showForm(){
        return view('create_artikel');
    }

    public function store(ArtikelRequest $request){
        //query builder
//        DB::table('artikels')->insert([
//        'title' => $request->title,
//        'content' => $request->content,
//        'author' => $request->author
//        ]);
        //model
//            $newArtikel = new Artikel();
//            $newArtikel->title = $request->title;
//            $newArtikel->content = $request->content;
//            $newArtikel->author = $request->author;
//
//            $newArtikel->save();

//
//        $request = $request->validate([
//            'title' => 'required|max:8'
//        ]);
//        $validator = Validator::make($request->all(), [
//            'title' => 'required|max:255',
//            'content' => 'required',
//        ],[
//            'title.requred' => 'title itu diperlukan'
//        ]);

//        if($validator->fails()){
//            return redirect(route('login'));
//        }'root' => storage_path('app/public'),

        $path = $request->file('image')->store('public/artikel_images');
        $path = substr($path,strlen('public/'));

//        $path = $request->file('image')->store('artikel_images');
        //Elonquent
        Artikel::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $path,
//            'user_id' => $request->user_id
            'user_id' => Auth::user()->id
        ]);
        return redirect(route('home'))->with('success','You article has been published');

    }

    public function show($id){
        $artikel = Artikel::find($id);
        return view('show_one_artikel',['artikel' => $artikel]);
    }

    public function showMy(){
        $artikels = Auth::user()->artikels;
        return view('show_user_artikel',['datas' => $artikels]);
    }
}
