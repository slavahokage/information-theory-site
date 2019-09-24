@extends('layouts.app')

@section('body')
    <link href="{{ asset('css/welcome-style.css') }}" rel="stylesheet">
    <div class="jumbotron" style="margin-top: 8%">
        <h1 id="title"class="display-3">Website about various types of encryption</h1>
        <p class="lead">Using this site, you can encrypt and decrypt files with various types of encryption</p>
        <hr class="my-4">
    </div>
@endsection
