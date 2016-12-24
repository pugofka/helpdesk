<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div class="container">

        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                @include('partials.nav')
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" placeholder="Поиск"></input>
                    </div>
                    <div class="col-md-4">
                        Добавить задачу
                    </div>
                    <div class="col-md-2">
                        <a href="#">{{ Auth::user()->name }}</a>
                    </div>
                    <div class="col-md-2">
                        <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                            <i class="icon ion-android-exit"></i> Выход
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="row">
                    
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    @yield('scripts-footer')



</body>
</html>
