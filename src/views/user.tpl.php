<!DOCTYPE html>
<ht>
<head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
      Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  }
body {
    background-color: lightgrey;
    font-family: Arial, sans-serif;
}
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh; /* Altura total menos la altura del header y del footer */
    margin: 0;
    flex-direction: column;
    background-color: white;
}
/* Estilos del encabezado */
header {
    background-color: #ff8900; /* color de fondo naranja */
    padding: 20px; /* espacio interior */
  }
  
  header h1 {
    color: #ffffff; /* color de texto blanco */
    font-size: 36px; /* tamaño de fuente */
    margin: 0; /* margen cero */
  }
  
  h2{
    margin-bottom: 50px;
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
.profile {
    margin-top: -50px;
    width: 100%;
    height: 70vh;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
#username{
    margin-bottom: 40px;
}
#sub{
    margin-right: 60px;
}
.avatar {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    background-color: grey;
    border-radius: 50%;
    margin-bottom: 20px;
}
.field {
    margin-top: 20px;
}
#subscription{
    color: black;
    text-decoration: none;
}
#subscription:hover{
    color: black;
    text-decoration: underline;
}
.BT {
    display: block;
    padding: 3px;
    background-color: #ff8900;
    border: 0;
    border-radius: 5px;
    color: white;
    font-size: 1rem;
    font-weight: bold;
    text-decoration: none;
    text-align: center;
  }
  .emailchange{
    display: flex;
    flex-direction: row;
  }
  #lapiz{
    width: 24px;
    height: 24px;
    margin-left: 10px;
  }
  #lapiz:hover{
      cursor: pointer;
  }
  .passwdchange{
    display: flex;
    flex-direction: row;
  }
  #lapiz2{
    width: 24px;
    height: 24px;
    margin-left: 10px;
  }
  #lapiz2:hover{
      cursor: pointer;
  }

  
  .BT:hover {
    background-color: #be6908;
  }
footer {
    background-color: #2b2b2b; /* color de fondo marrón */
    color: #ffffff; /* color de texto blanco */
    font-size: 14px; /* tamaño de fuente */
    padding: 10px; /* espacio interior */
    text-align: center; /* centrar el texto */
  }
</style>

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
    <div class="container">
    <h2>BASIC INFORMATION</h2>
        <div class="profile">
            <div class="avatar"></div>
            <h3 id="username">
                <?php
                    echo $_SESSION['user']->username;
                ?></h3>
            <div class="field">
                
                <label for="name">Correo electronico</label><br>
                <div class="emailchange">
                <h3>
                    
                        <p id='email'><?=$_SESSION['user']->email ?></p>
                        <form id='changeemail' action='/user/changeemail' method='POST' style='display: none;'>
                        <input id="newemail" name="newemail" type="email" required />
                        <input type="submit" value="Cambiar" />
                        </form>
                        

                 
                </h3>
                <img src="/public/images/icons8-lápiz-48.png" id="lapiz">

                </div>
                
            </div>
            <div class="field">
                <label for="location">Subscripción</label><br>
                <h3 id="sub">
                    <?php

                        if (isset($_COOKIE['subscription'])) {
                            if ($_COOKIE['subscription'] == 'mensual') {
                                echo '<a id="subscription" href="/subscription">Mensual</a>';
                            } else if ($_COOKIE['subscription'] == 'anual') {
                                echo '<a id="subscription" href="/subscription">Anual</a>';
                            } else if ($_COOKIE['subscription'] == 'free') {
                                echo '<a id="subscription" href="/subscription">Prueba Gratuita</a>';
                            } else {
                                echo '<a id="subscription" href="/subscription">Prueba Gratuita</a>';
                            }
                        }
                    ?></h3>
            </div>
            <div class="field">
                
                <label for="name">Contraseña</label><br>
                <div class="passwdchange">
                <h3>
                        <p id='passwd'>************</p>
                        <form id='changepasswd' action='/user/changepasswd' method='POST' style='display: none;'>
                        <input id="actualpasswd" name="actualpasswd" type="password" placeholder="Ingresa tu contraseña actual" required /><br>
                        <input id="newpasswd" name="newpasswd" type="password" placeholder="Ingresa tu contraseña nueva" required /><br>
                        <input type="submit" value="Cambiar" />
                        </form>        
                </h3>

                <img src="/public/images/icons8-lápiz-48.png" id="lapiz2">

                </div>
            </div>
        </div>
    </div>
    <footer>
        © 2024 LibrarySolutions. Todos los derechos reservados.
    </footer>
</body>
<script>
        var lapiz = document.getElementById("lapiz");
        var lapiz2 = document.getElementById("lapiz2");
        var email = document.getElementById("email");
        var newemail = document.getElementById("changeemail");
        var newpasswd = document.getElementById("changepasswd");
        lapiz.addEventListener('click', function () {
            email.style.display = 'none';
            newemail.style.display = 'block'; 
            lapiz.style.display = 'none';
        })

        lapiz2.addEventListener('click', function () {
            passwd.style.display = 'none';
            newpasswd.style.display = 'block';  
            lapiz2.style.display = 'none';
        })
        
        
</script>
</html>