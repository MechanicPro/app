<?php
    define ( 'ZAPERTO', true );
    require 'core/bootstrap.php';
    include 'core/Router.php';
    include 'core/Request.php';
    include 'app/controllers/TransactionsController.php';
    include 'app/controllers/PagesController.php';
    include 'app/controllers/AuthController.php';
    include 'app/models/TransactionModel.php';
    include 'app/models/AmountModel.php';
    use App\Core\Router;
    use App\Core\Request;
    Router::load('app/routes.php')->direct(Request::uri(), Request::method());


