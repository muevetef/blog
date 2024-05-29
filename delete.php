<?php
//recibe el id del post a eliminar por POST
//y ejecuta la consulta
//redirige al index

require 'database.php';

$isDeleteRequest = $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['_method'] ?? '' === 'delete');

if ($isDeleteRequest) {
    $id = $_POST['id'];

    $sql = 'DELETE FROM posts WHERE id = :id';

    $stmt = $pdo->prepare($sql);

    $stmt->execute(['id' => $id]);

    header('Location: index.php');
    exit;
}
