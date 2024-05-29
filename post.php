<?php
//si no existe el parametro id le asignamos null
$id = $_GET['id'] ?? null;
//si no tiene valor vamos al index
if (!$id) {
    header('Location: index.php');
    exit;
}

require 'database.php';
$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);
$params = ['id' => $id];
$stmt->execute($params);
$post = $stmt->fetch();

if(!$post){
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mini-blog</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Mi Mini-Blog de cosas</h1>
        </div>
    </header>

    <div class="container mx-auto p-4 mt-4">
        <div class="md my-4">
            <div class="rounded-lg shadow-md">
                <div class="p-4">
                    <h2 class="text-xl font-semibold"><?= $post['title'] ?></h2>
                    <p class="text-gray-700 text-lg mt-2">
                        <?= $post['body'] ?>
                    </p>
                </div>
            </div>
        </div>
        <a href="index.php">Volver</a>
    </div>
</body>

</html>