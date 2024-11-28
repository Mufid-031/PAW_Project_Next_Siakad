<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
    <title>Admin Dashboard</title>
</head>

<body>
    <img src="/image/bg.svg" alt="" class="w-full h-full absolute -z-50 object-cover">
    {{ $slot }}

</body>

</html>
