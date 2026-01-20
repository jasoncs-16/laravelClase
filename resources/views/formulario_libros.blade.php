<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestión de libros</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="">
        <form action="/" method="POST" enctype="multipart/form-data" class="flex flex-col">
            <input type="text" name="nombre" placeholder="Nombre" class="text-center">
            <input type="number" name="edad" placeholder="Edad" class="text-center">
            <button type="submit" class="">Enviar</button>
        </form>
    </body>
</html>