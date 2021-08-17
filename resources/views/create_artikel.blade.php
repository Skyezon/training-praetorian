@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('storeArtikel')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Article title" aria-describedby="emailHelp">
                @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Author</label>
            <input  value="{{Auth::user()->name}}" type="text" name="author" class="form-control" placeholder="John doe" id="exampleInputPassword1">
            @error('author')
            <div class=" text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Content</label>
            <textarea class="form-control" name="content" placeholder="Lorem ipsum"></textarea>
            @error('content')
            <div class=" text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input name="image"  type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            @error('image')
            <div class=" text-danger">
                {{$message}}
            </div>
            @enderror
{{--            <input class="d-none" name="user_id" value="{{Auth::user()->id}}"/>--}}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
