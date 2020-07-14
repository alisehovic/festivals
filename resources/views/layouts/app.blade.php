<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/openLayers/OpenLayers.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href="/font-awesome/css/font-awesome.min.css">



        <title>Festivals </title>

        <!-- Fonts -->        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>

        @if (Auth::user())

        @include("_menu", array(
            "user" => Auth::user()
        ))

         @endif

          <div class="container">
            @yield ('content')
          </div>

       

    </body>

</html>
 