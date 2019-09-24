<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <a class="navbar-brand" href="/">Information theory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-link">
                <a class="nav-link" href="{{route('rail-fence-encrypt')}}">Rail fence cipher</a>
            </li>

            <li class="nav-link">
                <a class="nav-link" href="{{route('turning-grille-encrypt')}}">Rotating grid method</a>
            </li>


            <li class="nav-link">
                <a class="nav-link" href="#">Vigenère cipher</a>
            </li>

        </ul>
    </div>
</nav>

@yield('body')
</body>
<footer class="page-footer font-small cyan darken-3">

    <div class="footer-copyright text-center py-3">
        Created by studuent Vyacheslav Smirnov
    </div>

</footer>
</html>
