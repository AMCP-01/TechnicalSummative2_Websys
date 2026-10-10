<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profile</h1>
        <p>Username: <?= esc($user['username']) ?></p>
        <p>Name: <?= esc($user['full_name']) ?></p>
        <p>Email: <?= esc($user['email']) ?></p>
        <a href="<?= site_url("index.php")?>">Home</a>
        <a href="<?= site_url("index.php/tasks")?>">Tasks</a>
        <a href="<?= site_url("index.php/about")?>">About</a>
</body>
</html>