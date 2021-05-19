<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coding Challenge</title>

        <style>
            body, html {
                padding: 0;
                margin: 0;
                height: 100%;
                background-color: #e6e6e6;
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
            <div id="app"></div>
    </body>
    <script src="{{ mix('js/index.js') }}"></script>
</html>
