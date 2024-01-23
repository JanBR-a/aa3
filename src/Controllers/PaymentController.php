<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Database\Connection;
    use App\Database\QueryBuilder;
    class PaymentController extends Controller {
      
        private $queryBuilder;

        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            $database = include('config.php');
            $pdo = Connection::make($database);
            $this->queryBuilder = new QueryBuilder($pdo);
            
         
        }
        function index(){
            echo View::render('payment');
        }

        function pay(){
            if (isset($_POST['Card-number']) && isset($_POST['Card-date']) && isset($_POST['CVV']) && isset($_SESSION['user']) && isset($_COOKIE['amount'])) {
                // Guarda los valores del formulario en las variables
                $id = $_SESSION['user']->id;
                $amount = $_COOKIE['amount'];
        
                // Obtiene la fecha actual en formato 'Y-m-d'
                $currentDate = date('Y-m-d');
                if($amount == 1){
                    $endDate = date('Y-m-d', strtotime(' + 1 month'));
                } else if($amount == 20){ 
                    $endDate = date('Y-m-d', strtotime(' + 1 year'));
                }
                
                $active = 1;
        
                // Inserta los datos del usuario en la base de datos
                $data = ['user_id' => $id, 'amount' => $amount, 'date' => $currentDate];
                $success = $this->queryBuilder->insert('payment', $data);
                $data2 = ['user_id' => $id,'start_date' => $currentDate, 'end_date' => $endDate, 'is_active' => $active];
                $success2 = $this->queryBuilder->insert('subscription', $data2);
                // Comprueba si la inserción fue exitosa o no y muestra un mensaje al usuario
                if ($success && $success2 && $amount == 1) {
                    // Establece una cookie con valor "mensual" y un mes de caducidad
                    setcookie('subscription', 'mensual', time() + 60 * 60 * 24 * 30, '/');
                    header('Location: /home');
                } else if ($success && $success2 && $amount == 20) {
                    // Establece una cookie con valor "anual" y un año de caducidad
                    setcookie('subscription', 'anual', time() + 60 * 60 * 24 * 365, '/');
                    header('Location: /home');
                } else if ($success === false || $success2 == false) {
                    echo "<script type='text/javascript'>alert('Error al pagar');</script>";
                    header('Location: /home');
                }
                
            } else {
                echo "<script type='text/javascript'>alert('Error al pagar');</script>";
                header('Location: /identify');
            }
        }
    }