<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : false;

        $res = array();

        if($id_user != null){
            $query = "SELECT * FROM tb_user WHERE id_user = $id_user";
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
        }else{
            $query = "SELECT * FROM tb_user";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_user" => $row['id_user'],
                        "username" => $row['username'],
                        "email" => $row['email'],
                        "nama" => $row['nama'],
                        "no_telp" => $row['no_telp'],
                        "alamat" => $row['alamat'],
                        "gambar" => $row['gambar']
                    ));
                }
            }            
        }


        echo json_encode($res);

    }

?>