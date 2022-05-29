<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">

</head>
<body class="body bg-secondary">

    <?php
        $title1 = 'index';
        include('Template.php');
    ?>

    <div class="container mt-5 center row">
        <a href="Member.php" class="ml-5 column">
        <div class="card">
            <img class="card-img-top" src="https://cdn3.vectorstock.com/i/thumb-large/37/67/team-user-logo-icon-design-vector-22953767.jpg" alt="Card image cap" width="150px" height="250px">
            <div class="card-body border border-Primary">
                <p class="card-text">Member</p>
            </div>
        </div>
        </a>
        <a href="Buku.php" class="ml-5 column">
        <div class="card">
            <img class="card-img-top" src="https://i.pinimg.com/originals/ca/2f/6a/ca2f6afd67315a4c980dabd908fe2719.jpg" alt="Card image cap" width="150px" height="250px">
            <div class="card-body border border-Primary">
                <p class="card-text">Buku</p>
            </div>
        </div>
        </a>
        <a href="Peminjaman.php" class="ml-5 column">
        <div class="card">
            <img class="card-img-top" src="https://blog-eperpus.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/02/17122220/Homepage_pinjam-unduh.png" alt="Card image cap" width="150px" height="250px">
            <div class="card-body border border-Primary">
                <p class="card-text">Peminjaman</p>
            </div>
        </div>
        </a>
    </div>   
</body>
</html>

