<?php   

   include __DIR__ . '/project/Login.php';
include __DIR__ . '/DispalyLogin.php';

    //creating objects 

    $object = new \Login\UserLogin();
    $object2 = new \Display\DisplayLogin();

    $object2-> userPageDisplay();
    $object-> loginPage();
?>