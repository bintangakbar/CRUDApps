<?php
require 'koneksi.php';
 
// buat koneksi ke database mysql
koneksi_buka();
 
// proses menghapus data CRUD
if(isset($_POST['hapus'])) {
    mysql_query("DELETE FROM CRUD WHERE id=".$_POST['hapus']);
} else {
    // deklarasikan variabel
    $id = $_POST['id'];
    $aktivitas    = $_POST['aktivitas'];
    $deskripsi   = $_POST['deskripsi'];
    $tanggal_deadline = $_POST['tanggal_deadline'];
    $status = $_POST['status'];
 
    // validasi agar tidak ada data yang kosong
    if($aktivitas!="" && $deskripsi!="" && $tanggal_deadline!="") {
        // proses tambah data CRUD
        if($id == 0) {
            mysql_query("INSERT INTO CRUD VALUES('','$aktivitas','$deskripsi','$tanggal_deadline','$status')");
        // proses ubah data CRUD
        } else {
            mysql_query("UPDATE CRUD SET
            aktivitas = '$aktivitas',
            deskripsi = '$deskripsi',
            tanggal_deadline = '$tanggal_deadline',
            status = '$status'
            WHERE id = $id
            ");
        }
    }
}
 
// tutup koneksi ke database mysql
koneksi_tutup();
 
?>