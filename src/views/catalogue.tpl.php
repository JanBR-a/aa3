<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/catalogue.css">
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
<div class="container">
  <h1>Acabados de llegar</h1>
  <div class="row">
    <div class="col">
      <img src="/public/images/libro.png" alt="L'assassí de la muntanya">
      <h2>L'assassí de la muntanya</h2>
      <p style="" >Motte, Anders de la</p>
      <p style="text-align: center; margin-top: 10px;" >Un assassinat deixarà pistes màgiques que només el Leo Aksler pot veure... l'aliga...</p>
      <a class="BT" href="/book">Leer</a>
    </div>
    <div class="col">
      <img src="/public/images/libro.png" alt="Soy joven, NO GILIPOLLAS">
      <h2>Soy joven, NO GILIPOLLAS</h2>
      <p>Hernández, Sheila</p>
      <p style="text-align: center; margin-top: 10px;">Cómo superar los desafios y cumplir tus objetivos por la creadora des...</p>
      <a class="BT" href="/book">Leer</a>
    </div>
    <div class="col">
      <img src="/public/images/libro.png" alt="Los secretos de Hyrule">
      <h2>Los secretos de Hyrule</h2>
      <p>Suárez Mouriño, Adrián</p>
      <p style="text-align: center; margin-top: 10px;">La guía definitiva que te acompañará en tu recorrido por la trilogía de videojuegos...</p>
      <a class="BT" href="/book">Leer</a>
    </div>
  </div>
</div>
</main>
<footer>
        © 2024 LibrarySolutions. Todos los derechos reservados.
</footer>
</body>
</html>
