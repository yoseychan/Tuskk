@extends('layouts.app')

@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
         <h1 class="title-articles">Article editing form</h1>
        <editarticle data-article="{{ json_encode($article) }}" data-user="{{ json_encode(\Auth::user()) }}"></editarticle>
    </div>
    @endsection
