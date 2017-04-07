<?php

require '../config/connect.php';
require __DIR__ . '/../vendor/autoload.php';

$route = $_GET['route'] ?? 'listSpectacle';
$render = '';

if ($route == 'listSpectacle') {
    $spectacle = new \air_de_rien\controller\SpectacleController();
    $render = $spectacle->listAll();

} elseif ($route == 'showSpectacle') {
    $spectacle = new \air_de_rien\controller\SpectacleController();
    $render = $spectacle->show($_GET['id']);

} elseif ($route == 'addSpectacle') {
    $spectacle = new \air_de_rien\controller\SpectacleController();
    $render = $spectacle->add();
}

require '../src/view/header.php';
echo $render;
require '../src/view/footer.php';
