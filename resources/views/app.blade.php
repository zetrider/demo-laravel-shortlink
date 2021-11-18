<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    @routes
</head>

<body>
    @inertia

    <script src="{{ mix('js/app.js') }}" deffer></script>
</body>

</html>
