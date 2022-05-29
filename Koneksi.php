<?php
    function koneksi(){
        try{
            $conn= new PDO(
                'mysql:host=localhost;dbname=perpustakaan',
                'root', '',
                array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true)
            );
        } catch (PDOException $error){
            print "Koneksi Gagal : ". $error->getMessage(). "<br>";
            die();
        }
        return $conn;
    }
?>