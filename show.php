<?php
include 'config.php';
$stmt = $pdo->query("SELECT * FROM Pictures");
$pictures = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['picture_id'])) {
    $selectedPicture = array_filter($pictures, fn($pic) => $pic['id'] == $_POST['picture_id'])[0] ?? null;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр изображений</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Просмотр изображений</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="picture" class="form-label">Выберите изображение:</label>
            <select name="picture_id" id="picture" class="form-select">
                <?php foreach ($pictures as $picture): ?>
                    <option value="<?= $picture['id'] ?>"><?= $picture['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Показать</button>
    </form>

    <?php if (isset($selectedPicture)): ?>
        <div class="mt-4">
            <h3><?= htmlspecialchars($selectedPicture['name']) ?></h3>
            <p>Размер: <?= $selectedPicture['size'] ?> байт</p>
            <img src="<?= htmlspecialchars($selectedPicture['imagepath']) ?>" alt="<?= htmlspecialchars($selectedPicture['name']) ?>" class="img-fluid">
        </div>
    <?php endif; ?>
</div>
</body>
</html>
