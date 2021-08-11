<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $artikel->delete();
        return redirect(route('home'))->with('success','Your article has been deleted');
    }

    public function update(ArtikelRequest $request,$id){
        $artikelWillUpdate = Artikel::find($id);
        $artikelWillUpdate->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
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

        //Elonquent
        Artikel::create([
        'title' => $request->title,
        'content' => $request->content,
        'author' => $request->author
        ]);
        return redirect(route('home'))->with('success','You article has been published');

    }
}
