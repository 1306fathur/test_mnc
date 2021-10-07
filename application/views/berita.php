<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Judul</h1>

        <div class="row">
            <div class="col-lg-6">
                <a href="" class="btn btn-primary mb-4 mr-5" data-toggle="modal" data-target="#NewMenuModal">Add New Menu</a>
                <form action="<?= base_url('welcome/berita') ?>" method="GET">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit">Search</i></button>
                </form>
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Content</th>
                            <th scope="col">Publish Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1 ?>
                        <?php foreach ($beritas as $berita) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $berita->title ?></td>
                                <td><?= $berita->description ?></td>
                                <td><?= $berita->content ?></td>
                                <td><?= $berita->publish_date ?></td>
                                <td>
                                    <a href="<?= base_url('welcome/berita_edit/') . $berita->id ?>" class="badge badge-pill badge-success">Edit</a>
                                    <a href="<?= base_url('welcome/berita_delete/') . $berita->id ?>" class="badge badge-danger" onclick="return confirm ('Yakin?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="NewMenuModal" tabindex="-1" role="dialog" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewMenuModalLabel">Add Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('welcome/berita_post') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mt-2" for="">Title</label>
                            <input type="text" class="form-control" id="menu" name="title" placeholder="Title Name">
                            <label class="mt-2" for="">Description</label>
                            <input type="text" class="form-control" id="menu" name="description" placeholder="Desctiption">
                            <label class="mt-2" for="">Content</label>
                            <textarea name="content" id="" cols="60" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>