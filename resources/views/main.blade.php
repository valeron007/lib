<!doctype>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @section('header')
            <meta charset="utf-8">
            <title>Laravel</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>Laravel</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <link href="{{ \Illuminate\Support\Facades\URL::asset('css/app.css')  }}" rel="stylesheet" type="text/css">
            <script src="{{\Illuminate\Support\Facades\URL::asset('js/app.js')}}"></script>
        @show
    </head>
    <body>


    <footer>
        @section('footer')
            <h1>footer</h1>
        @endsection
    </footer>
    </body>
</html>
