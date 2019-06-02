@extends('main')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('header')
        @parent
    @endsection

</head>
<body>
    <header>
        @section('navbar')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" id="book" href="#">Книги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="author" href="#">Авторы</a>
                </li>
            </ul>
        @show
    </header>

    <main>
{{--        <a class="btn btn-primary" href="/authors/create/" role="button">Добавить автора</a>--}}
        <table class="table" id="data-information">
            <tbody>

            </tbody>
        </table>
    </main>

    <footer>

    </footer>
</body>
</html>
