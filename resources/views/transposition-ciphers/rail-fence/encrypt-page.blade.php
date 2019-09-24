@extends('layouts.app')


@section('body')
    <link href="{{ asset('css/center-element.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rail-fence-cipher-page-style.css') }}" rel="stylesheet">
    <div id="rail-fence-title">
        <h1>Rail fence cipher</h1>
    </div>

    <div class="center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="content">
            <form method="post" action="{{route('rail-fence-get-encrypt-file')}}" enctype="multipart/form-data">
                @csrf
                <blockquote class="blockquote text-center">
                    <h1>Encrypt file</h1>
                </blockquote>

                <div class="row">
                    <input name="key" class="form-control" type="text" placeholder="Key">
                </div>

                <div class="row">
                    <div class="form-group">
                        <input name="file" type="file" class="form-control-file" id="inputFile"
                               aria-describedby="fileHelp">
                    </div>
                </div>

                <div id="encrypt-btn" class="row">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Encrypt</button>
                </div>
            </form>
        </div>

    </div>

    <button id="decrypt-btn" type="button" class="btn btn-outline-primary"><a href="{{route('rail-fence-decrypt')}}">Decrypt
            file</a></button>

@endsection
