<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $idKeberangkatan = $_GET['id_keberangkatan'];
        $idDriver = $_GET['id_driver'];
        
        $res = array();

        $query = "INSERT INTO tb_riwayat (id_keberangkatan, id_driver) VALUES ($idKeberangkatan, $idDriver)";
        $sql = mysqli_query($con, $query);
        if($sql){
            $res['value'] = 1;
            $res['message'] = "Berhasil menambah riwayat";
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal menambah riwayat";
        }

        echo json_encode($res);

    }

?>