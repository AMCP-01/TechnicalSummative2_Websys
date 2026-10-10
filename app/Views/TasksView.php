<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<body>
    <h1>All Tasks</h1>

<?php foreach ($tasks as $task): ?>

    <p>
        TITLE: <?= esc($task['title']) ?><br>
        STATUS: <?= esc($task['status']) ?><br>
        DATE: <?= esc($task['task_date']) ?><br>

        <a href="<?= site_url('index.php/tasks/edit/' . $task['id']) ?>">
            Edit
        </a>

        <form action="<?= site_url('index.php/tasks/archive/' . $task['id']) ?>"
              method="post"
              style="display:inline;">

            <button type="submit">Delete</button>
        </form>
    </p>

<?php endforeach; ?>
        <a href="<?= site_url('index.php/logout') ?>">Logout</a>
        
</body>
</html>