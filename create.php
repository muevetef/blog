<?php
require 'database.php';
//Si llegan datos por post se tratan
//Se insertan en la bdd
//sinó llegan datos se muestra el formulario
//si todo va bién hacemos una redirección a index

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));

    $sql = 'INSERT INTO posts (title, body) VALUES (:title, :body)';
    $stmt = $pdo->prepare($sql);

    $params = [
        'title' => $title,
        'body' => $body
    ];

    $stmt->execute($params);

    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nuevo Post</title>
</head>

<body class="bg-gray-11">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Mi Mini-Blog de cosas</h1>
        </div>
    </header>
    <div class="flex justify-center mt-10">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-semibold mb-6">Crear un nuevo Post</h1>
            <form action="#" method="post">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Título</label>
                    <input type="text" id="title" name="title" placeholder="Título del post" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div class="mb-6">
                    <label for="body" class="block text-gray-700 font-medium">Contenido</label>
                    <textarea id="body" name="body" placeholder="Escribe el contenido..." class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">Crear</button>
                    <a href="index.php" class="text-blue-500 hover:underline">Ir a posts</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>