<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>
<body>

    <h1>Customers</h1>

    <?php foreach ($customers as $customer): ?>
        <p>
            FULL NAME: <?= esc($customer['full_name']) ?><br>
            EMAIL: <?= esc($customer['email']) ?><br>
            PHONE: <?= esc($customer['phone']) ?><br>

            <a href="<?= site_url('index.php/customer/edit/' . $customer['id']) ?>">
                Edit
            </a>
        </p>
    <?php endforeach; ?>

   <a href="<?= site_url("index.php/pages")?>">Go back</a>

</body>
</html>