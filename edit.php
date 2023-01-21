<?php
require_once("signupConfig.php");
$data = new signupConfig();
$id = $_GET['id'];
$data->setId($id);

if(isset($_POST['edit'])){
    $data->setFirstName($_POST['firstname']);
    $data->setLastName($_POST['lastname']);
    $data->setAddress($_POST['address']);

    echo $data->updateData();
    echo "<script>alert('Data updated successfully');document.location='allData.php'</script>";

}

$record = $data->fetchOne();
$value = $record[0];

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
       <div class="form-box">
    <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Edit <b>Employee</b></h2></div>
                </div>
            </div>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col">
        <form action="" method="post">
            <label for="fname">First Name</label>
            <input type="text" name="firstname" id="fname" value="<?= $value['firstName']; ?>"/>
            <label for="lname">Last Name</label>
            <input type="text" name="lastname" id="lname" value="<?= $value['lastName']; ?>"/>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?= $value['address']; ?>"/>

            <input type="submit" value="Update" name="edit" />
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</div>
    </body>
</html>