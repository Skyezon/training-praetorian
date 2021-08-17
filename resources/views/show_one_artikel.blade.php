@extends('layouts.app')

@section('content')
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="jumbotron">
            {{$artikel->title}}
        </div>
        <div>
            <img src="{{'/storage/'.$artikel->image}}" alt="image-{{$artikel->image}}">
        </div>
        <p class="text-justify">
            {{$artikel->content}}
        </p>
        <div class="d-flex align-self-end">
            <span>Author :{{$artikel->author}}</span>
        </div>
        <div class="mb-3">
            <form action="{{route('postComment',$artikel->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="exampleInputEmail1" class="form-label">Comment</label>
                <textarea name="comments" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </textarea>
                <button class="btn btn-primary" type="submit">submit</button>
            </form>
        </div>
        <div>
        @foreach($artikel->commentUsers as $user)
            <div>
                comment by : {{$user->name}}
            </div>
            <div>
                comment : {{$user->pivot->comments}}
            </div>
        @endforeach
        </div>

    </div>
@endsection
