@extends('layouts.app')

@section('content')
    <div>
        <featured></featured>
        <div class="container-xl">
            <div class="row justify-content-center">
                <larticles></larticles>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="row justify-content-around">
                <div class="writer">
                    <h4>Are you our new writer?</h4>
                    <p>We are looking for a new member for our news team!</p>
                    <a href="#">Submit Application</a>
                </div>
                <table class="scores">
                    <tr>
                        <th>Top 5 games of 2020</th>
                    </tr>
                    <tr>
                        <td>Game 1</td>
                        <td>100/100</td>
                    </tr>
                    <tr>
                        <td>Game 2</td>
                        <td>80/100</td>
                    </tr>
                    <tr>
                        <td>Game 3</td>
                        <td>67/100</td>
                    </tr>
                    <tr>
                        <td>Game 4</td>
                        <td>70/100</td>
                    </tr>
                    <tr>
                        <td>Game 5</td>
                        <td>91/100</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
