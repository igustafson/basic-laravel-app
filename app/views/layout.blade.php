<!doctype html>

<html lang="en">

  <head>

    <meta charset="UTF-8">

    <title>Basic Larivel App by Ian Gustafson</title>

    {{ HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
    {{ HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css') }}
    {{ HTML::style('css/app.css') }}
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
    {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}

  </head>

  <body>

    <h1>Basic Laravel App</h1>

    @yield('content')

  </body>

</html>