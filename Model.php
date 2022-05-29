<?php
    
    require("./Koneksi.php");

    function viewData($table_name){
        $state = koneksi() -> prepare("SELECT * FROM $table_name");
        $state->execute();
        $result = $state->fetchAll();

        if (!empty($result)) {
            if ($table_name == "member") {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_member']. "</td>";
                    echo "<td>" . $row['nama_member'] . "</td>";
                    echo "<td>" . $row['nomor_member'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row["tgl_mendaftar"] . "</td>";
                    echo "<td>" . $row["tgl_terakhir_bayar"] . "</td>";
                    echo "<td>";
                    echo "<a href='FormMember.php?id_member=" . $row['id_member'] . "' class='btn btn-warning ml-2 mb-1' style='width: 100px'>Edit</a><br>";
                    echo "<a href='Member.php?id_member=" . $row['id_member'] . "' onclick=\"return confirm('Yakin Hapus?'\"  class='btn btn-danger ml-2' style='width: 100px')>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<article class=\" bg-dark text-white p-2\">Jumlah Data : ".count($result)."</article>";
            }elseif ($table_name == "buku") {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_buku']. "</td>";
                    echo "<td>" . $row['judul_buku'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>" . $row["tahun_terbit"] . "</td>";
                    echo "<td>";
                    echo "<a href='FormBuku.php?id_buku=" . $row['id_buku'] . "' class='btn btn-warning ml-2 mb-1' style='width: 100px'>Edit</a><br>";
                    echo "<a href='Buku.php?id_buku=" . $row['id_buku'] . "' onclick=\"return confirm('Yakin Hapus?')\" class='btn btn-danger ml-2' style='width: 100px'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<article class=\" bg-dark text-white p-2\">Jumlah Data : ".count($result)."</article>";
            }elseif ($table_name == "peminjaman") {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_peminjaman']. "</td>";
                    echo "<td>" . $row["tgl_peminjaman"] . "</td>";
                    echo "<td>" . $row["tgl_kembali"] . "</td>";
                    echo "<td>";
                    echo "<a href='FormPeminjaman.php?id_peminjaman=" . $row['id_peminjaman'] . "' class='btn btn-warning ml-2 mb-1' style='width: 100px'>Edit</a><br>";
                    echo "<a href='Peminjaman.php?id_peminjaman=" . $row['id_peminjaman'] . "' onclick=\"return confirm('Yakin Hapus?')\" class='btn btn-danger ml-2' style='width: 100px'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<article class=\" bg-dark text-white p-2\">Jumlah Data : ".count($result)."</article>";
            }
        }
    }

    function tambahdatamember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar){
        $mysql = "INSERT INTO `member` ( `nama_member`, `nomor_member`, `alamat`, `tgl_mendaftar`, `tgl_terakhir_bayar`) VALUES (:nama_member,:nomor_member,:alamat,:tgl_mendaftar,:tgl_terakhir_bayar)";
        $state = koneksi()->prepare($mysql);
        $result = $state->execute(array(':nama_member' => $nama_member, ':nomor_member' => $nomor_member, ':alamat' => $alamat, ':tgl_mendaftar' => $tgl_mendaftar, ':tgl_terakhir_bayar' => $tgl_terakhir_bayar));
        if (!empty($result)){
            header('location:Member.php');
        }
    }

    function tambahdatabuku($judul,$penulis,$penerbit,$thnterbit){
        $mysql = "INSERT INTO `buku` ( `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (:judul,:penulis,:penerbit,:tahun_terbit)";
        $state = koneksi()->prepare($mysql);
        $result=$state->execute(array(':judul' => $judul, ':penulis' => $penulis, ':penerbit' => $penerbit, ':tahun_terbit' => $thnterbit));
        if (!empty($result)){
            header('location:Buku.php');
        }
    }

    function tambahdatapeminjaman($tglpinjam, $tglkembali){
        $mysql = "INSERT INTO `peminjaman` (`tgl_peminjaman`, `tgl_kembali`) VALUES (:tglpinjam,:tglkembali)";
        $state = koneksi()->prepare($mysql);
        $result = $state->execute(array(':tglpinjam' => $tglpinjam, ':tglkembali'=> $tglkembali));

        if (!empty($result)){
            header('location:Peminjaman.php');
        }
    }

    function editmember(){
        $state = koneksi()->prepare("SELECT * FROM member where id_member=" . $_GET["id_member"]);
        $state->execute();
        $GLOBALS['result'] = $state->fetchAll();
    }

    function editbuku()
    {
        $state = koneksi()->prepare("SELECT * FROM buku where id_buku=" . $_GET["id_buku"]);
        $state->execute();
        $GLOBALS['result'] = $state->fetchAll();
    }

    function editpeminjaman(){
        $state = koneksi()->prepare("SELECT * FROM peminjaman WHERE id_peminjaman =". $_GET['id_peminjaman']);
        $state->execute();
        $GLOBALS['result'] = $state->fetchAll();
    }

    function updatemember($id, $nama, $no_member, $almt, $tgl_daftar, $tgl_terakhir_bayar){
        $pdo_statement = koneksi()->prepare(
            "update member set nama_member='" . $nama . "', nomor_member='" . $no_member . "', alamat='" . $almt . "', tgl_mendaftar='" . $tgl_daftar . "', tgl_terakhir_bayar='" . $tgl_terakhir_bayar . "' where id_member=" . $id
        );
        $result = $pdo_statement->execute();
        if (!empty($result)) {
            header('location:Member.php');
        }
    }

    function updatebuku($id, $judul, $penulis, $penerbit, $thnterbit){
        $pdo_statement = koneksi()->prepare(
            "update buku set judul_buku='" . $judul . "', penulis='" . $penulis . "', penerbit='" . $penerbit . "', tahun_terbit='" . $thnterbit . "' where id_buku=" . $id
        );
        $result = $pdo_statement->execute();
        if (!empty($result)) {
            header('location:Buku.php');
        }
    }

    function updatepeminjaman($id, $tglpinjam, $tglkembali) {
        $pdo_statement = koneksi()->prepare(
            "UPDATE peminjaman SET tgl_peminjaman='" . $tglpinjam ."', tgl_kembali='" . $tglkembali . "' WHERE id_peminjaman = ". $id
        );
        $result = $pdo_statement->execute();
        if (!empty($result)) {
            header('location:Peminjaman.php');
        }
    }

    function hapusmember($id_member){
        $state = koneksi()->prepare("DELETE FROM member where id_member=" . $id_member);
        $result = $state->execute();
        if ($result) {
            header('location:Member.php');
        }

    }
    
    function hapusbuku($id_buku){
        $state = koneksi()->prepare("DELETE FROM buku where id_buku=" . $id_buku);
        $result = $state->execute();
        if ($result) {
            header('location:Buku.php');
        }
    }
    
    function hapuspeminjaman($id_peminjaman){
        $state = koneksi()->prepare("DELETE FROM peminjaman WHERE id_peminjaman=" . $id_peminjaman);
        $result = $state->execute();
        if ($result) {
            header('location:Peminjaman.php');
        }
    }

?>