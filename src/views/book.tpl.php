<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/book.css">
</head>
<body>
<header>
    <h1>LibrarySolutions</h1>
</header>
<nav>
    <ul>
        <li><a href="/home">Inicio</a></li>
        <li><a href="/catalogue">Catálogo</a></li>
        <li><a href="#">Contacto</a></li>
        <?php
                // Comprobar si la variable de sesión 'user' está establecida
                if (isset($_SESSION['user'])) {
                    // Mostrar el nombre del usuario en el enlace
                    echo "<li><a href='/user'>" . $_SESSION['user']->username . "</a></li>";

                } else {
                    // Mostrar el enlace para identificarse
                    echo '<li><a href="/identify">Identíficate</a></li>';
                }
            ?>
    </ul>
</nav>    
<main>
<div class="book-container">
    <div class="book-cover">
        <img src="/public/images/libro.png" alt="Book Cover">
    </div>
    <div class="book-info">
        <h1 class="title">Título del libro</h1>
        <p class="author">Autor, Autor</p>
        <p class="description">Descripción del libro</p>
        <a href="#" class="more-info">Ver más información</a>
        <?php
        if (isset($_COOKIE['subscription']) && ($_COOKIE['subscription'] === 'mensual' || $_COOKIE['subscription'] === 'anual' || $_COOKIE['subscription'] === 'free')) {
            echo "<a href='/read' class='read'>Leer Ya</a>";
        } else {
            echo "<a href='/subscription' class='read'>Subscríbete ya para leerlo</a>";
        }
        ?>
        </div>
</div>
<div class="fotocontainer">
    <img class="imgs" src="/public/images/libro.png" alt="">
    <img class="imgs" src="/public/images/libro.png" alt="">
    <img class="imgs" src="/public/images/libro.png" alt="">
</div>
</main>
<footer>
        © 2024 LibrarySolutions. Todos los derechos reservados.
    </footer>
</body>
</html>