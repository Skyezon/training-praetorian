@extends('layouts.app')

@section('content')
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::get('no'))
        <div class="alert alert-danger">
            {{Session::get('no')}}
        </div>
    @endif



    <div class="container">
    @if(Auth::user())
        <div>
            <a href="{{route('showArtikelForm')}}">show form artikel</a>
        </div>
        <div>
            <a href="{{route('showMyArtikel')}}">show my artikels</a>
        </div>
    @endif
    <div>
        <a href="{{route('showArtikels')}}">show all artikels</a>
    </div>

</div>
@endsection
