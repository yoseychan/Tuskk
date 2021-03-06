@extends('layouts.app')


@section('content')
    <div>
        <singlearticle data-article="{{json_encode($article)}}"></singlearticle>
    </div>

    <div class="container-xl comment-section">
        <h3 class="section-title">Comments</h3>
        @guest

            <p class=" guest">Please <a href="/register">Register</a> or <a href="/login">Login</a> to post a comment</p>
            @endguest
        @auth
            <commentsform data-article="{{json_encode($article)}}"></commentsform>
        @endauth
        <comments data-comment="{{ json_encode($article) }}" data-user="{{ json_encode(\Auth::user()) }}"></comments>
    </div>


@endsection
