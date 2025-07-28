<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'controller/BoardGameController.php';

$controller = new BoardGameController();
$controller->handleRequest();