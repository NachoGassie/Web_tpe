<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>

        <a href="home"><h2>Peliculas</h2></a>
        <a href="genreList">Lista de Generos</a> 
        {if !$isAdmin}
            <a href="login">Inciar Sesion</a> 
        {else}
            <a href="showForm">Agregar Pelicula</a>
            <a href="logout">Cerrar Sesion</a>
        {/if}

    </header>
    <main>