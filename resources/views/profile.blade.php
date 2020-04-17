@extends('layouts.app')

@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
        <profile data-author="{{json_encode($author)}}" data-user="{{ json_encode(\Auth::user()) }}"></profile>
    </div>


@endsection
