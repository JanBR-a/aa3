<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Database\Connection;
    use App\Database\QueryBuilder;

    class UserController extends Controller {
      
        private $queryBuilder;

        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            $database = include('config.php');
            $pdo = Connection::make($database);
            $this->queryBuilder = new QueryBuilder($pdo);
         
        }
        function index(){
            echo View::render('user');
        }

        function changeemail(){
            if (isset($_POST['newemail'])) {
                $email = $_POST['newemail'];
                $data = ['email' => $email];
                $id = $_SESSION['user']->id;

                $conditions = ['id' => $id];

                $success = $this->queryBuilder->update('users', $data, $conditions);

                if ($success) {
                    header('Location: /user');
                    $_SESSION['user']->email = $email;
                } else {
                    echo "<script type='text/javascript'>alert('Error al cambiar el correo');</script>";
                    header('Location: /user');
                }
            }

        }

        function changepasswd(){
            if(isset($_POST['actualpasswd']) && isset($_POST['newpasswd'])) {
                $actPasswd = $_POST['actualpasswd'];
                $newPasswd = $_POST['newpasswd'];
                $hashed_passwd = password_hash($newPasswd, PASSWORD_BCRYPT);
                $id = $_SESSION['user']->id;

                $conditions = ['id' => $id];

                if(password_verify($actPasswd, $_SESSION['user']->password)){
                    $data = ['password' => $hashed_passwd];
                    $success = $this->queryBuilder->update('users', $data, $conditions);
                    if ($success) {
                        header('Location: /user');
                        $_SESSION['user']->password = $newPasswd;
                    } else {
                        echo "<script type='text/javascript'>alert('Error al cambiar la contraseña');</script>";
                        header('Location: /user');
                    }
                }
                
            }
        }
       
    }