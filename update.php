<?php
$id = $_GET['id'] ?? null;
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

if (!$post) {
    header('Location: index.php');
    exit;
}

//mirar si nos llega un POST con _method put
$isPutRequest = $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['_method'] ?? '' === 'put');

if ($isPutRequest) {
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $id = $_POST['id'];

    $sql = 'UPDATE posts SET title = :title, body = :body WHERE id = :id';

    $stmt = $pdo->prepare($sql);
    $params = [
        'id' => $id,
        'title' => $title,
        'body' => $body
        ];
    $stmt->execute($params);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar el Post</title>
</head>

<body class="bg-gray-11">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Mi Mini-Blog de cosas</h1>
        </div>
    </header>
    <div class="flex justify-center mt-10">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-semibold mb-6">Editar el Post</h1>
            <form action="#" method="post">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Título</label>
                    <input type="text" id="title" name="title" value="<?= $post['title'] ?>" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div class="mb-6">
                    <label for="body" class="block text-gray-700 font-medium">Contenido</label>
                    <textarea id="body" name="body" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"><?= $post['body'] ?></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">Editar</button>
                    <a href="index.php" class="text-blue-500 hover:underline">Volver a posts</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>