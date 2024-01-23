<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Database\Connection;
    use App\Database\QueryBuilder;

    class RegisterController extends Controller {
      
        private $queryBuilder;

        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            $database = include('config.php');
            $pdo = Connection::make($database);
            $this->queryBuilder = new QueryBuilder($pdo);
        }

        function index(){
            echo View::render('register');
        }

        function register (){
            if (isset($_POST['Username']) && isset($_POST['email']) && isset($_POST['password'])) {
                // Guarda los valores del formulario en las variables
                $username = $_POST['Username'];
                $email = $_POST['email'];
                $passwd = $_POST['password']; 
        
                // Hashea la contraseña usando PASSWORD_BCRYPT
                $hashed_passwd = password_hash($passwd, PASSWORD_BCRYPT);
        
                // Inserta los datos del usuario en la base de datos
                $data = ['username' => $username, 'email' => $email, 'password' => $hashed_passwd];
                $success = $this->queryBuilder->insert('users', $data);
        
                // Comprueba si la inserción fue exitosa o no y muestra un mensaje al usuario
                if ($success) {
                    header('Location: /login');
                } else {
                    echo "<script type='text/javascript'>alert('Error al registrarse');</script>";
                    header('Location: /identify');
                }
            }
        }
        
    }