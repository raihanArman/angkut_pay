<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $idDriver = $_GET['id_user'];

        $res = array();

        $query = "SELECT * FROM tb_user WHERE id_user = $idDriver";
        $sql = mysqli_query($con, $query);
        if($sql){
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_array($sql);
                $res['id_user'] = $row['id_user'];
                $res['ktp'] = $row['ktp'];
                $res['email'] = $row['email'];
                $res['nama'] = $row['nama'];
                $res['no_hp'] = $row['no_hp'];
                $res['alamat'] = $row['alamat'];
                $res['foto'] = $row['foto'];
                $res['jk'] = $row['jenis_kelamin'];
                $res['plat'] = $row['plat'];
                $res['merk_mobil'] = $row['merk_mobil'];
                
            }
        } 

        echo json_encode($res);

    }


?>