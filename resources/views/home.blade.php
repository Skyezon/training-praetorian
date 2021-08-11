@extends('layouts.app')

@section('content')
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif


<div class="container">
    <div>
        <a href="{{route('showArtikelForm')}}">show form artikel</a>
    </div>
    <div>
        <a href="{{route('showArtikels')}}">show all artikels</a>
    </div>
</div>
@endsection
