<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield("title") </title>

        <!-- Fontes Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

    </head>
    <body>

        <header class="navbar navbar-expand-md navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/ss-events-logo.svg" alt="SS Events">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link"> Eventos </a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link"> Criar evento </a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link"> Entrar </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link"> Cadastrar </a>
                    </li>
                </ul>

            </div>

        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session("msg"))
                        <p class="msg">{{ session("msg") }}</p>
                    @endif
                    
                    @yield("content")
                </div>
            </div>
        </main>

        

        <footer>
            <p>  SS-Events &copy; {{date("Y")}} | By: Salathiel Serra </p>
        </footer>

        <!-- JS ION Incons -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>