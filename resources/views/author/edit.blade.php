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

    <form method="POST" action="/authors/edit/{{$author['id']}}">
        @csrf
        <p>Введите имя</p><br>
        <input name="name" placeholder="{{$author['name']}}" type="string">
        <button>Сохранить</button>
    </form>
    <a href="{{ URL::to('/') }}">Назад</a>
</main>

<footer>

</footer>
</body>
</html>


