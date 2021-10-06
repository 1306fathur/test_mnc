<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><img src="<?= $user['avatar'] ?>" alt="Foto <?= $user['first_name'] . $user['last_name']  ?>"></td>
                        <td><a href="<?= base_url('welcome/nomor_3_detail/') . $user['id'] ?>" class="badge badge-info">Detail</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>