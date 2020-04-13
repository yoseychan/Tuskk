@extends('layouts.app')

@section('content')

    <div class="container-xl">
        <div class="spacer"></div>
        <category data-category="{{json_encode($category)}}"></category>
    </div>

@endsection
