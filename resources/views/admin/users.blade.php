@extends('layouts.app')
@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
        <h1 class="title-articles">User management</h1>
        <users data-users="{{ json_encode($users) }}" data-logged="{{ json_encode(\Auth::user()) }}"></users>
    </div>
@endsection
