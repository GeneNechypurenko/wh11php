<?php
include 'config.php';
$stmt = $pdo->query("SELECT COUNT(*) AS count FROM Pictures");
$count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Главная страница</h1>
    <p>Количество изображений: <strong><?= $count ?></strong></p>
    <a href="upload.php" class="btn btn-primary">Загрузить изображения</a>
    <a href="show.php" class="btn btn-secondary">Просмотр изображений</a>
</div>
</body>
</html>
