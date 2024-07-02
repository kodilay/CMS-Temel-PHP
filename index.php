<?php

require __DIR__."/vendor/autoload.php";
require __DIR__."/config.php";
use Core\Starter;

$cms = new Starter();

require __DIR__."/App/Routes/Route.php";

?>