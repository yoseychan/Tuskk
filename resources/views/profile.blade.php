@extends('layouts.app')

@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
        <h1 >Profile</h1>
        <profile data-author="{{json_encode($author)}}"></profile>
    </div>


    @endsection
