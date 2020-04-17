@extends('layouts.app')

@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
        <editarticle data-article="{{ json_encode($article) }}" data-user="{{ json_encode(\Auth::user()) }}"></editarticle>
    </div>
    @endsection
