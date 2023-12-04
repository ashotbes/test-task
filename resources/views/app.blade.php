<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test task</title>
    <link
        type="text/css"
        rel="stylesheet"
        href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
        type="text/css"
        rel="stylesheet"
        href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"
    />

    <!-- Required scripts -->
    @vite('resources/css/app.css')
</head>
<body>
<div id="app"></div>
@vite('resources/js/app.js')


<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
</body>
</html>
