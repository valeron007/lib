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

</header>

<main>

    <form method="POST" action="/authors/create/">
        @csrf
        <p>Введите имя</p><br>
        <input name="name" placeholder="Введите автора" type="string">
        <button>Создать автора</button>
    </form>
    <a href="{{ URL::to('/') }}">Назад</a>



</main>

<footer>

</footer>
</body>
</html>

