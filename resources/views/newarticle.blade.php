@extends('layouts.app')


@section('content')
    <div class="container-xl  main">
        <div class="spacer"></div>
        <h1 class="title-articles">Create a new article</h1>
        <newarticle data-user="{{ json_encode(\Auth::user()) }}"></newarticle>
    </div>


@endsection

