<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $tempat = $_GET['tempat'];

        $res = array();

        $query = "SELECT * FROM tb_keberangkatan WHERE tempat = '$tempat'";
        $sql = mysqli_query($con, $query);
        if($sql){
            while($row = mysqli_fetch_array($sql)){
                array_push($res, array(
                    "id_keberangkatan" => $row['id_keberangkatan'],
                    "id_penumpang" => $row['id_penumpang'],
                    "tempat" => $row['tempat'],
                    "jumlah_orang" => $row['jumlah_orang'],
                    "barang_bawaan" => $row['barang_bawaan']
                ));
            }
        }

        echo json_encode($res);

    }


?>