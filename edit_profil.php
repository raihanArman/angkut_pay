<?php
    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_user = $_POST['id_user'];
        $nama = isset($_POST['nama']) ? $_POST['nama'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : false;
        $noHp = isset($_POST['no_hp']) ? $_POST['no_hp'] : false;
        $foto = isset($_POST['foto']) ? $_POST['foto'] : false;
        $merkMobil = isset($_POST['merk_mobil']) ? $_POST['merk_mobil'] : false;
        $plat = isset($_POST['plat']) ? $_POST['plat'] : false;
        $jk = isset($_POST['jk']) ? $_POST['jk'] : false;
        $ktp = isset($_POST['ktp']) ? $_POST['ktp'] : false;

        $res = array();

        if($foto != null){
            $query_tampil = "SELECT * FROM tb_user WHERE id_user = $id_user";
            $sql_tampil = mysqli_query($con, $query_tampil);
            if($sql_tampil){
                $row = mysqli_fetch_array($sql_tampil);
                if($row['foto'] != ""){
                    unlink("gambar/profil/".$row['foto']);
                }
                $path = "./gambar/profil/";
                $filename = "profil_".rand(9,999).".jpeg";
                $destination = $path.$filename;
                $query_edit = "UPDATE tb_user SET email = '$email', nama = '$nama', ktp = '$ktp',merk_mobil = '$merkMobil', plat = '$plat', jenis_kelamin = '$jk', foto = '$filename',alamat = '$alamat', no_hp = '$noHp' WHERE id_user = $id_user";
                $sql_edit = mysqli_query($con, $query_edit);
                if($sql_edit){
                    file_put_contents($destination, base64_decode($foto));
                     $res['value'] = 1;
                    $res['message'] = "Berhasil edit";
                }else{
                    $res['value'] = 0;
                    $res['message'] = "Gagal edit";
                 }
            }
        }else{
            $query_edit = "UPDATE tb_user SET email = '$email', nama = '$nama', ktp = '$ktp',merk_mobil = '$merkMobil', plat = '$plat', jenis_kelamin = '$jk', alamat = '$alamat', no_hp = '$noHp' WHERE id_user = $id_user";
            $sql_edit = mysqli_query($con, $query_edit);
            if($sql_edit){
                $res['value'] = 1;
                $res['message'] = "Berhasil edit";
            }else{
                $res['value'] = 0;
                $res['message'] = "Gagal edit";
            }
        }


        echo json_encode($res);


    }

?>