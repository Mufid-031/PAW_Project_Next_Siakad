@props([
    'class' => '',
]);

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Next Siakad</title>
</head>
<body class="{{ $class }}">
    {{ $slot }}
</body>
</html>