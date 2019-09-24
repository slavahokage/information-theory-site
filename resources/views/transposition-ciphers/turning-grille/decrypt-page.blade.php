@extends('layouts.app')


@section('body')
    <link href="{{ asset('css/center-element.css') }}" rel="stylesheet">

    <link href="{{ asset('css/turning-grille-page-style.css') }}" rel="stylesheet">

    <div id="turning-grille-title">
        <h1>Turning grille cipher</h1>
    </div>

    <div class="center">

        <div class="content">
            <form method="post" action="{{route('turning-grille-get-decrypt-file')}}" enctype="multipart/form-data">
                @csrf
                <blockquote class="blockquote text-center">
                    <h1>Decrypt file</h1>
                </blockquote>


                <div class="row">
                    <div class="form-group">
                        <input name="file" type="file" class="form-control-file" id="inputFile"
                               aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="row" style="margin-left: 30%">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Decrypt</button>
                </div>
            </form>
        </div>

    </div>

    <button id="decrypt-btn" type="button" class="btn btn-outline-primary"><a
                href="{{route('turning-grille-encrypt')}}">Encrypt
            file</a></button>

@endsection
