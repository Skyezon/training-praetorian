@extends('layouts.app')

@section('content')
    <form action="{{route('updateArtikel',$artikel->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" value="{{$artikel->title}}" class="form-control" id="exampleInputEmail1" placeholder="Article title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Author</label>
            <input type="text" name="author" value="{{$artikel->author}}" class="form-control" placeholder="John doe" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Content</label>
            <textarea class="form-control" name="content"  placeholder="Lorem ipsum">{{$artikel->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
