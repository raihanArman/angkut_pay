<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];

        $res = array();

        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $sql = mysqli_query($con, $query);
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_array($sql);
            $res['value'] = 1;
            $res['id_user'] = $row['id_user'];
        }else{
            $res['value'] = 0;
        }

        echo json_encode($res);

    }

?>