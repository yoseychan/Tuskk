@extends('layouts.app')

@section('content')

    <div class="main container-xl">
        <div class="spacer"></div>
        <h1>edit user</h1>
        <edituser data-user="{{ json_encode($user) }}" data-logged="{{ json_encode(\Auth::user()) }}"></edituser>
    </div>

@endsection
