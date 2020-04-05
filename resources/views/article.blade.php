@extends('layouts.app')


@section('content')
    <div>
        <singlearticle data-article="{{json_encode($article)}}"></singlearticle>
    </div>

    <div class="container-xl ">
        <h3 class="section-title">Comments</h3>

{{--        @auth--}}
{{--        <commentform></commentform>--}}
{{--        @endauth--}}
        <comments data-comment="{{json_encode($article)}}"></comments>
    </div>


@endsection
