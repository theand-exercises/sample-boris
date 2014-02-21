<?php
require_once 'vendor/autoload.php';

use Goutte\Client;
use Carbon\Carbon;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\ErrorHandler;

// create a log channel
$log = new Logger('goutte');
$log->pushHandler(new RotatingFileHandler('./logs/goutte.log', 0, Logger::WARNING));

ErrorHandler::register($log);

$boris = new \Boris\Boris("REPL>");

\Boris\Loader\Loader::load($boris, array(
    new \Boris\Loader\Provider\Composer(),
));

$boris->setPrompt('prompty> ');

$boris->setLocal(array('log' => $log));

$boris->start();
