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
                    <a href="#" class="writer-btn">Submit Application</a>
                </div>
                <table class="scores">
                    <tr>
                        <th>Top 5 games to play in 2020</th>
                    </tr>
                    <tr>
                        <td>Animal Crossing</td>
                        <td>98/100</td>
                    </tr>
                    <tr>
                        <td>Minecraft</td>
                        <td>91/100</td>
                    </tr>
                    <tr>
                        <td>Call of Duty: MW </td>
                        <td>87/100</td>
                    </tr>
                    <tr>
                        <td>TemTem</td>
                        <td>85/100</td>
                    </tr>
                    <tr>
                        <td>Stardew valley</td>
                        <td>79/100</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
