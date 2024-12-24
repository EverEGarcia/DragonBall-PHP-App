<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Character Details</h1>

    <?php
    ini_set('display_errors', 1);
    $id = htmlspecialchars($_GET['id']);
    $api_url = "https://dragonball-api.com/api/characters/$id";
    $file = file_get_contents($api_url);
    $data = json_decode($file, true);

    if ($data): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['name']) ?>">
            <div class="card-details">
                <h2><?= htmlspecialchars($data['name']) ?></h2>
                <p><strong>Race:</strong> <?= htmlspecialchars($data['race']) ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($data['gender']) ?></p>
                <p><strong>Ki:</strong> <?= htmlspecialchars($data['ki']) ?></p>
                <p><strong>Max Ki:</strong> <?= htmlspecialchars($data['maxKi']) ?></p>
                <p><strong>Affiliation:</strong> <?= htmlspecialchars($data['affiliation']) ?></p>
                <p><strong>Description:</strong> <?= htmlspecialchars($data['description']) ?></p>
                <h3>Home Planet</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($data['originPlanet']['name']) ?></p>
                <p><strong>Description:</strong> <?= htmlspecialchars($data['originPlanet']['description']) ?></p>
                <img src="<?= htmlspecialchars($data['originPlanet']['image']) ?>" alt="<?= htmlspecialchars($data['originPlanet']['name']) ?>" style="width: 200px; height: auto;">
            </div>
        </div>

        <div class="transformations">
            <h2>Transformations</h2>
            <?php foreach ($data['transformations'] as $transformation): ?>
                <div class="transformation-card">
                    <img src="<?= htmlspecialchars($transformation['image']) ?>" alt="<?= htmlspecialchars($transformation['name']) ?>">
                    <div>
                        <h3><?= htmlspecialchars($transformation['name']) ?></h3>
                        <p><strong>Ki:</strong> <?= htmlspecialchars($transformation['ki']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="index.php" class="btn">Back to List</a>
    <?php else: ?>
        <p>Character not found.</p>
    <?php endif; ?>
</body>
</html>