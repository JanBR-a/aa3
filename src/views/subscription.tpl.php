<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
      Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  }
header {
    background-color: #ff8900; /* color de fondo naranja */
    padding: 20px; /* espacio interior */
  }
  
  header h1 {
    color: #ffffff; /* color de texto blanco */
    font-size: 36px; /* tamaño de fuente */
    margin: 0; /* margen cero */
  } 
  /* Estilos del menú de navegación */
  nav {
  
    background-color: #2b2b2b; /* color de fondo marrón */
    padding: 20px; /* espacio interior */
  }
  
  nav ul {
    list-style: none; /* quitar los puntos de la lista */
    margin: 0; /* margen cero */
    padding: 0; /* espacio interior cero */
  }
  
  nav li {
    display: inline-block; /* mostrar los elementos en línea */
    margin-right: 20px; /* margen derecho */
  }
  
  nav a {
    color: #ffffff; /* color de texto blanco */
    text-decoration: none; /* quitar el subrayado */
  }
  
  nav a:hover {
    text-decoration: underline; /* añadir el subrayado al pasar el ratón */
  }    
  .container{
    display: flex; 
    flex-direction: row; 
    justify-content: space-around;
    align-items: center;
    margin-top: 150px;
    
  }
  main{
    height: 67vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  footer {
    background-color: #2b2b2b; /* color de fondo marrón */
    color: #ffffff; /* color de texto blanco */
    font-size: 14px; /* tamaño de fuente */
    padding: 10px; /* espacio interior */
    text-align: center; /* centrar el texto */
  }
</style>
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
                    echo "<li><a href='/user'>" . $_SESSION['user']->username . '</a></li>';
                } else {
                    // Mostrar el enlace para identificarse
                    echo '<li><a href="/identify">Identíficate</a></li>';
                }
            ?>
        </ul>
    </nav>
<main>
<h1>SUBSCRIPCIONES</h1> 
<div class="container">
<div class="card" style="width: 18rem;">
  <img src="/public/images/libro.png" class="card-img-top" alt="...">
  <div class="card-body" style ="display: flex; flex-direction: column; align-items: center;">
    <h5 class="card-title">MENSUAL</h5>
    <p class="card-text" style="text-align: center;">Subscripcion mensual de 1€ a todos nuestros servicios.</p>
    <a href="/payment" class="btn btn-primary" id="sub-mensual" style="background-color: #ff8900; border-color: #ff8900;">SUBSCRIBIRME</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="/public/images/libro.png" class="card-img-top" alt="...">
  <div class="card-body" style ="display: flex; flex-direction: column; align-items: center;">
    <h5 class="card-title">ANUAL</h5>
    <p class="card-text" style="text-align: center;">Subscripcion anual de 20€ a todos nuestros servicios incluyendo, funcionalidades exclusivas.</p>
    <a href="/payment" class="btn btn-primary" id="sub-anual" style="background-color: #ff8900; border-color: #ff8900;">SUBSCRIBIRME</a>
  </div>
  </div> 
  </div>
</main> 
<footer>
        © 2024 LibrarySolutions. Todos los derechos reservados.
    </footer>   
</body>
<script>
var SubMensual = document.getElementById('sub-mensual');
SubMensual.addEventListener('click', function () { 
    document.cookie = "amount=1; path=/";
  });

var SubAnual = document.getElementById('sub-anual');
SubAnual.addEventListener('click', function () { 
    document.cookie = "amount=20; path=/";
  });

</script>
</html>