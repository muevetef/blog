<?php

//Credenciales de la conexión
$host = 'localhost';
$port = 3306;
$dbname = 'blog';
$username = 'blogadmin';
$password = '1234';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";


try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Fecth como array associativo por defecto
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // echo 'La conexión se ha realizado con éxito.';
} catch (PDOException $e) {
    echo 'La conexión con la base de datos ha fallado: ' . $e->getMessage();
}
