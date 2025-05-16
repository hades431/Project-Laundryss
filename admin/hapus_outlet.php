<?php
    if($_GET['id_outlet']){
        include "koneksi.php";
        // Check if the outlet is being used in the transaction
         $query_cek1=mysqli_query($conn,"delete from user where id_outlet='".$_GET['id_outlet']."'");
         $query_cek2=mysqli_query($conn,"delete from paket where id_outlet='".$_GET['id_outlet']."'");
        $qry_cek=mysqli_query($conn,"delete from transaksi where id_outlet='".$_GET['id_outlet']."'");
        $qry_hapus=mysqli_query($conn,"delete from outlet where id_outlet='".$_GET['id_outlet']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses Hapus Outlet');location.href='outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus Outlet');location.href='outlet.php';</script>";
        }
    }
?>