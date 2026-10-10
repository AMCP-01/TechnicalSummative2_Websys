<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<?php if (empty($user)): ?>

    <p>User not found.</p>

<?php else: ?>

    <form action="<?= site_url('index.php/user/update/' . $user['id']) ?>"
          method="post"
          enctype="multipart/form-data">

        <label>Username:</label>
        <input type="text"
               name="username"
               value="<?= esc($user['username']) ?>">

        <br><br>

        <label>Full Name:</label>
        <input type="text"
               name="full_name"
               value="<?= esc($user['full_name']) ?>">

        <br><br>

        <label>Email:</label>
        <input type="email"
               name="email"
               value="<?= esc($user['email']) ?>">

        <br><br>

        <label>Avatar:</label>
        <input type="file"
               name="avatar"
               accept=".jpg,.jpeg,.png">

        <br><br>

        <button type="submit">Update User</button>
    </form>

<?php endif; ?>

<a href="<?= site_url('index.php/user') ?>">Back to Users</a>

</body>
</html>