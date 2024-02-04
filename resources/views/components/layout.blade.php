<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Controle de séries</title>
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-_bHKygMA.css') }}" /> --}}
    {{-- <script src="{{ asset('build/assets/app-8vezzgaX.js') }}" defer></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>
    
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                     
                    <button class="btn btn-link">Sair</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}">Entrar</a>
            @endguest
        </div>
    </nav>

    <div class="container">
        <h1>@yield('title')</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>