<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/payment.css">
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
                echo "<li><a href='/user'>" . $_SESSION['user']->username . '</a></li>';
            } else {
                // Mostrar el enlace para identificarse
                echo '<li><a href="/identify">Identíficate</a></li>';
            }
        ?>
    </ul>
</nav>    
<main>
        <div class="main-container">
            <div class="form-container">
                <img id="card-img" src="/public/images/tarjeta.png" alt="">
                <form action="/payment/pay" method="post">
                    <div class="number-container">
                        <label for="Card-number">Número de Tarjeta:</label>
                        <input id="Card-number" name="Card-number" type="number" required />
                    </div>
                    <div class="date-container">
                        <label for="Card-date">Fecha de Caducidad:</label>
                        <input id="Card-date" name="Card-date" type="text" required />
                    </div>
                    <div class="CVV-container">
                        <label for="CVV">CVV:</label>
                        <input id="CVV" name="CVV" type="number" required />
                    </div>
                    <div class="submit-container">
                        <button class="submit-button" type="submit">PAGAR</button>
                    </div>
                </form>
            </div>
        </div>
</main>
<footer>
        © 2024 LibrarySolutions. Todos los derechos reservados.
</footer>
</body>
</html>