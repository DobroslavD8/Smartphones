<?php
/**
 * Created by PhpStorm.
 * User: Limitless
 * Date: 23.12.2018 г.
 * Time: 18:48
 */
?>

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'Smartphones')}}</title>
    </head>
    <body>
    <div class="container">
    @include('nav.nav')
        @include('nav.msg')
        @yield('content')
    </div>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
                CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>
