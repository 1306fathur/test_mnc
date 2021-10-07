<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a>Email : <?= $_SESSION['user']['email'] ?></a>
    <br>
    <br>
    <br>
    <a>Status : <?= $_SESSION['user']['login_status'] ?></a>
    <br>
    <br>
    <br>
    <a href="<?= base_url('welcome/logout') ?>">Logout</a>
</body>
</html>