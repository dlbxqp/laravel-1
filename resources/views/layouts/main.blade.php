<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="theme-color" content="#FFC814">
        <meta name="publisher-URL" content="/">

        <title>My first Laravel</title>

        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
        <style>
.pace-progress{
    background-color: var(--color-yellow) !important
}
        </style>
    </head>

    <body>
        <main>
            <header>
@include('header')
            </header>
            <section>
@yield('page content')
            </section>
            <footer>
@include('footer')
            </footer>
        </main>
    </body>
</html>
