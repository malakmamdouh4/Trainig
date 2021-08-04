<?php

    $dsn    = 'mysql:host=localhost;dbname=furniture';       // Data Source Name
    $user   = 'root';
    $pass   = '';

    try
    {
        GLOBAL $db ;
        $db = new PDO($dsn,$user,$pass) ;
    } 
    catch (PDOException $e)
    {
        echo 'Failed To Connect ' . $e->getMessage();
    }

