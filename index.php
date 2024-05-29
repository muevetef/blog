<?php
require 'database.php';

//Preparar la consulta
$stmt = $pdo->query('SELECT * FROM posts');

//ejecutamos la consulta
// $stmt->execute();

//Obenemos los resultados
$posts = $stmt->fetchAll();

// echo "<pre>";
// var_dump($posts);
// echo "</pre>";
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

    <?php foreach ($posts as $post) : ?>
      <div class="md my-4">
        <div class="rounded-lg shadow-md">
          <div class="p-4">
            <h2 class="text-xl font-semibold"><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            <p class="text-gray-700 text-lg mt-2">
              <?= $post['body'] ?>
            </p>
            <small>Creado el <?= $post['created_at'] ?></small>
          </div>
        </div>
      </div>
    <?php endforeach ?>
    <div class="mt-6">
      <a href="create.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">Nuevo Post</a>
    </div>

  </div>

</body>

</html>