<?php
    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $idPenumpang = $_POST['id_penumpang'];
        $tempat = $_POST['tempat'];
        $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : false;
        $barang = isset($_POST['barang']) ? $_POST['barang'] : false;

        $res = array();

        $query_input = "INSERT INTO tb_keberangkatan (id_penumpang, tempat, jumlah_orang,barang_bawaan) VALUES ('$idPenumpang', '$tempat', '$jumlah', '$barang')";
        $sql_input = mysqli_query($con, $query_input);
        if($sql_input){
            $res['message'] = "Berhasil";
            $res['value'] = 1;
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal";
        }

        echo json_encode($res);

    }
?>