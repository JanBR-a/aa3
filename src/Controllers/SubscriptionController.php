<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Database\Connection;
    use App\Database\QueryBuilder;

    class SubscriptionController extends Controller {
      
        private $queryBuilder;

        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            $database = include('config.php');
            $pdo = Connection::make($database);
            $this->queryBuilder = new QueryBuilder($pdo);
        }

        function index(){
            echo View::render('Subscription');
        }
    }
