<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$id){

        Comment::create([
           'user_id' => Auth::user()->id,
           'artikel_id' => $id,
            'comments' => $request->comments
        ]);
        return redirect(route('showOneArtikel',$id))->with('success','your comment have been published');
    }
}
