<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Database\Connection;
    use App\Database\QueryBuilder;

    class LoginController extends Controller {
      
        private $queryBuilder;

        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            $database = include('config.php');
            $pdo = Connection::make($database);
            $this->queryBuilder = new QueryBuilder($pdo);
         
        }
        function index(){
            echo View::render('login');
        }

        function login (){
            if (isset($_POST['email']) && isset($_POST['password'])) {
                // Guarda los valores del formulario en las variables
                $email = $_POST['email'];
                $passwd = $_POST['password']; 
                $currentDate = date('Y-m-d');
                $endDate = date('Y-m-d', strtotime(' + 1 month'));
                $active = 1;
                // Define las condiciones para seleccionar el usuario
                $conditions = ['email' => $email];
        
                // Obtiene los datos del usuario de la base de datos
                $user = $this->queryBuilder->select('users', $conditions);
        
                // Comprueba si se encontró un usuario y si la contraseña es correcta
                if (!empty($user) && password_verify($passwd, $user[0]->password)) {
                    // Inicia la sesión del usuario con los datos del usuario
                    $_SESSION['user'] = $user[0];
                    if(isset ($_COOKIE['subscription'])){
                        header('Location: /home');
                    } else {
                    setcookie('subscription', 'free', time() + 60 * 60 * 24 * 30, '/');
                    $data = ['user_id' => $_SESSION['user']->id,'start_date' => $currentDate, 'end_date' => $endDate, 'is_active' => $active];
                    $success = $this->queryBuilder->insert('subscription', $data);
                    header('Location: /home');
                    }

                } else {
                    echo "<script type='text/javascript'>alert('Error al iniciar sesión');</script>";
                    header('Location: /identify');
                }
            }
        }
        
    }