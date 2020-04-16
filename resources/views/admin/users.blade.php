@extends('layouts.app')
@section('content')

    <div class="container-xl main">
        <div class="spacer"></div>
        <h1 class="title-articles">User management</h1>
        <table class="table admin table-hover">
            <thead class="">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Role coming soon</td>
                    <td>
                        <a class="action-icon" href="#">
                            <span class="material-icons">create</span>
                        </a>
                        <a class=" action-icon" href="#">
                            <span class="material-icons">delete_sweep</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
