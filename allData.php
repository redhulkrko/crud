<?php
require_once("signupConfig.php");
$data = new signupConfig();
$all = $data->fetchAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <a class="btn btn-info add-new" href="signup.php">Add New</a>
                    </div>
                </div>
            </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Address</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all as $key => $value) { ?>
                <tr>
                    <td><?= $value['firstName'] ?></td>
                    <td><?= $value['lastName'] ?></td>
                    <td><?= $value['address'] ?></td>
                    <td>
                        <a class="edit" href="edit.php?id=<?=$value['id']?>"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" href="delete.php?id=<?=$value['id']?>&req=delete"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>
        </table>
        </div>
    </div>
</div>     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>