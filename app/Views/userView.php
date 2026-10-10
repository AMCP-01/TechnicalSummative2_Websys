<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <?php foreach ($users as $user): ?>

    <?php
        $avatar = !empty($user['avatar'])
            ? base_url('uploads/avatars/' . $user['avatar'])
            : base_url('images/avatar-placeholder.png');
    ?>

    <div>
        <img src="<?= esc($avatar) ?>"
             alt="User avatar"
             width="100"
             height="100">

        <p>
            USERNAME: <?= esc($user['username']) ?><br>
            FULL NAME: <?= esc($user['full_name']) ?><br>
            EMAIL: <?= esc($user['email']) ?><br>

            <a href="<?= site_url('index.php/user/edit/' . $user['id']) ?>">
                Edit
            </a>
        </p>
    </div>

    <hr>

<?php endforeach; ?>
        <a href="<?= site_url('index.php/logout') ?>">Logout</a>
</body>
</html>