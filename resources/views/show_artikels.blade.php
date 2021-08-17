@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Content</th>
{{--            <th scope="col" class="text-center">Actions</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($datas as $key => $artikel)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>
                <a href="{{route('showOneArtikel',$artikel->id)}}">{{$artikel->title}}</a>
            </td>
            <td>{{$artikel->author}}</td>
            <td>{{$artikel->content}}</td>
{{--            <td>--}}
{{--                <div class="d-flex justify-content-around">--}}
{{--                    <a type="button" href="{{route('showUpdateArtikelForm',$artikel->id)}}" class="btn-success btn">Update</a>--}}
{{--                    <form action="{{route('deleteArtikel',$artikel->id)}}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('delete')--}}
{{--                        <button type="submit" class="btn-danger btn">delete</button>--}}
{{--                    </form>--}}
{{--                    <a href="{{route('deleteArtikel',$artikel->id)}}" class="btn btn-danger">delete</a>--}}
{{--                </div>--}}
{{--            </td>--}}
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
