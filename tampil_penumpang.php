<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $idPenumpang = $_GET['id_penumpang'];

        $res = array();

        $query = "SELECT * FROM tb_penumpang WHERE id_penumpang = '$idPenumpang'";
        $sql = mysqli_query($con, $query);
        if($sql){
            $row = mysqli_fetch_array($sql);
            $res['id_penumpang'] = $row['id_penumpang'];
            $res['email'] = $row['email'];
            $res['nama'] = $row['nama'];
            $res['foto'] = $row['foto'];
            $res['no_hp'] = $row['no_hp'];
        }  

        echo json_encode($res);

    }


?>