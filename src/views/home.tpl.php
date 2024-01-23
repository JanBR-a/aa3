<html>
<head>
    <title>LibrarySolutions - Tu librería online</title>
    <link href="/public/css/home.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>LibrarySolutions</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
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
        <h2>Tu librería online</h2>
        <p id="t2">¿Te gusta leer? ¿Buscas libros de calidad a buen precio? ¿Quieres disfrutar de la comodidad de leer desde tu dispositivo? Entonces, LibrarySolutions es tu sitio. Somos una librería online que te ofrece una amplia selección de libros de todos los géneros y para todos los gustos. Aquí encontrarás desde los clásicos de la literatura hasta las últimas novedades editoriales, pasando por los best-sellers más populares y los libros más recomendados. Además, te ofrecemos un servicio rápido y seguro. Y si tienes alguna duda o consulta, puedes contactar con nuestro equipo de atención al cliente, que estará encantado de ayudarte.</p>
        <p id="t3"><br><br>Para acceder a nuestro catálogo y realizar tus compras, solo tienes que registrarte o iniciar sesión con tu cuenta de usuario. Es muy fácil y rápido, y te permitirá disfrutar de todas las ventajas de ser parte de nuestra comunidad de lectores. Podrás guardar tus libros favoritos, recibir recomendaciones personalizadas, participar en sorteos y promociones, y mucho más. No esperes más y únete a LibrarySolutions, tu librería online de confianza.<br><br></p>
    </main>
    <footer>
        © 2024 LibrarySolutions. Todos los derechos reservados.
    </footer>
</body>
</html>
