@extends('layouts.app')


@section('content')
    <div>
        <single data-article="{{json_encode($article)}}"></single>
    </div>
    <div class="container-xl">
        <h3 class="section-title">Comments</h3>
{{--        @auth--}}
{{--        <commentform></commentform>--}}
{{--        @endauth--}}
{{--        <comments></comments>--}}
    </div>


@endsection
