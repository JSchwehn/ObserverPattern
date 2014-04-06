<?php

require_once 'MySubject.php';
require_once 'MyObserver.php';
require_once 'UserRegister.php';
require_once 'Logger.php';

$registerLogic = new \ObserverPattern\UserRegister();

$registerLogic->showRegisterForm();
try{
    $registerLogic->processRegisterForm('JSchwehn','jschwehn@example.com');
    $registerLogic->processRegisterForm('JSchwehn','jschwehn-at-example.com');
} catch(Exception $e) {
    echo " - EXCEPTION: ".$e->getMessage();
}
$registerLogic->updateUser();
$registerLogic->deleteUser();

