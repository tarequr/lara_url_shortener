<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.ccs') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="main-body">
            <div class="container">
                <header>
                    <h1 class="text-center">Laravel URL Shortener</h1>
                </header>
                <div>
                    <form method="POST" action="{{ route('url.shortener.store') }}">
                        @csrf
                        <input type="" name="url" id="url">
                        <br>
                        <button type="submit">URL Shortener</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
