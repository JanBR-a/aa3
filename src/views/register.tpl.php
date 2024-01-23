<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/login.css" rel="stylesheet">
    </head>
    <body>
        <div class="main-container">
            <div class="form-container">
                <form action="/register/register" method="post">
                    <div class="name-container">
                        <label for="Username">Nombre de Usuario:</label>
                        <input id="Username" name="Username" type="text" required />
                    </div>
                    <div class="email-container">
                        <label for="email">Correo Electrónico</label>
                        <input id="email" name="email" type="email" required />
                    </div>
                    <div class="password-container">
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" required />
                    </div>
                    <div class="submit-container">
                        <button class="submit-button" type="submit">ENTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>