<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewain</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: rgb(245,247,250);
        }
        main {
            flex: 1 0 auto;
        }
        .nav-wrapper {
            padding-left: 20px;
            padding-right: 20px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .btn {
            border-radius: 4px;
            text-transform: none;
        }
        .input-field input:focus {
            border-bottom: 1px solid rgb(38,166,154) !important;
            box-shadow: 0 1px 0 0 rgb(38,166,154) !important;
        }
    </style>
</head>
<body>
    <header>
        <nav class="indigo darken-3">
            <div class="nav-wrapper">
                <a href="" class="brand-logo">Sewain</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @auth
                        <li>
                            <a href="{{ route('gedung.index') }}">Gedung</a>
                        </li>
                        <li>
                            <a href="{{ route('penyewan.index') }}">Penyewan</a>
                        </li>
                        <li>
                            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
