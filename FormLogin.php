<?php
session_start();
include 'Koneksi.php';
if (isset($_SESSION['nomor_member'])) {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">

</head>
<body class="body bg-secondary" >
<div class=" p-3 container mt-5 center bg-dark text-white" style="width: fit-content;">
    <div class="border border-light p-2">

    <form action="Login.php" method="POST">

            <div class="row">
                <div class="col" style="width: 250px">
                    Nomor Member    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="text" name="no_member" autofocus required><br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    Password    
                </div>
                <div class="col" style="width: 250px;">
                    <input type="password" name="pwd" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 250px">
                    <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
            
    </form>
    </div>
    </div>
</body>
</html>