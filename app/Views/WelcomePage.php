<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tasks</h1>

<?php foreach ($tasks as $task): ?>
    <article>
        <h2><?= esc($task['title']) ?></h2>
        <p>Status: <?= esc($task['status']) ?></p>
        <p>Date: <?= esc($task['task_date']) ?></p>
    </article>
<?php endforeach; ?>
        <a href="<?= site_url("index.php/tasks")?>">Tasks</a>
        <a href="<?= site_url("index.php/about")?>">About</a>
        <a href="<?= site_url("index.php/profile")?>">Profile</a>
</body>
</html>