<?php
    $host = "localhost";
    //$db = "kops9577_test";
    $db = "kopigenik";
    //$user = "kops9577_admin";
    $user = "root";
    //$pass = "orUT&%*bq#D*C03qfzmhr0U@k4K@aq8D";
    $pass = "";
    $charset = "utf8";

    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES=>false
        ];   
        $pdo = new PDO($dsn,$user,$pass,$opt);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>