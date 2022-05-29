<?php
session_start();
require 'Koneksi.php';
$nomorMember = $_POST['no_member'];
$pass = $_POST['pwd'];


$sql = koneksi()->prepare("SELECT * FROM member WHERE nomor_member = :nomorMember");
$sql->bindParam('nomorMember', $nomorMember, PDO::PARAM_STR);
$sql->execute();
$hasil = $sql->fetch();
$verify = password_verify($pass, $hasil['pass']);

    if ($verify) {
        $_SESSION["nomor_member"] = $hasil['nomor_member'];
        $_SESSION["nama_member"] = $hasil['nama_member'];
        header("Location: index.php");
    } else {
        echo "Nomor member atau Password yang anda masukkan salah";
        echo "<br> atau klik disini untuk <a href='FormLogin.php'>login</a>";
    }
?>