<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- 
     
13/09/2021     
Ciao ragazzi, creiamo con Laravel la nostra alternativa al più famoso CMS del modo: WordPress.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina.
In particolare:
iniziare un nuovo progetto
collegare database e creare migration della tabella posts
creare modello Post
creare un seeders per 50 posts
attivare l’autenticazione secondo i comandi qui sopra.
Bonus.
Iniziate nella home page a “stilare” il vostro template con la lista dei post, lavorate con scss. ( Post::all() )

14/09/2021
L’esercizio di oggi: Laravel Boolpress
La repo è la stessa di ieri.
Cosa dovete fare:
Recuperate la repo di ieri
Inserite un Controller di tipo Resource
Sviluppare Index e Show
Una volta finito, spingete su scss :occhiolino:
Consiglio:
Create una forma tabellare, come visto in classe per la vostra index, dove nell’ultima colonna inserire le azioni possibili (in questo caso, per oggi, solo il link che vi riporta alla show)


16/09/2021
Esercitiamoci un po’ insieme, ripassiamo questi passaggi nel progetto boolpress
“agganciamo” un nuovo template per la form alla rotta create -> return view…
creiamo il form come visto a lezione (ricordiamoci di @csrf, action e method)
inseriamo il button submit
inseriamo un dd($request) all’interno del metodo store del nostro controller per debuggare la nostra request e vedere quali sono i dati ricevuti (dopo elimineremo questo dump e svilupperemo il salvataggio vero e proprio)

Aggiungiamo create e store, come visto in classe.
Validiamo i dati con le validazioni di laravel e mostriamo gli errori.

17/09/2021
Prima di augurarvi buon lavoro e infine buon weekend, vi riepilogo cosa c’è da fare oggi :faccia_leggermente_sorridente:
Seguendo ciò che abbiamo fatto in classe aggiungere edit/update e destroy.
Ricordatevi dei fillable se utili al vostro scopo, oppure di centralizzare (come abbiamo fatto con il metodo fillAndSaveCar) il processo di salvataggio di un model e riutilizzarlo in update e store.
Bonus:
Per la cancellazione inserire una modale di conferma come ipotizzato in classe (usate bootstrap modal)

 -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @if(Auth::check())
            <a href="{{ route('posts.create') }}">
                <button
                    type="button"
                    class="btn btn-outline-primary btn-sm"
                    data-toggle="modal"
                    data-target=".bd-example-modal-sm"
                >
                    <i class="bi bi-plus-square"></i>
                </button>
                New Post
            </a>
            @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
