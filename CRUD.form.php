<?php
// panggil file koneksi.php
require 'koneksi.php';
 
// buat koneksi ke database mysql
koneksi_buka();
 
// tangkap variabel id
$id = $_POST['id'];
 
// query untuk menampilkan mahasiswa berdasarkan id
$data = mysql_fetch_array(mysql_query("
SELECT * FROM mahasiswa WHERE id=".$id
));
 
// jika kd_mhs > 0 / form ubah data
if($id> 0) {
    $aktivitas = $data['aktivitas'];
    $deskripsi = $data['deskripsi'];
    $tanggal_deadline = $data['tanggal_deadline'];
    $kd_status = $data['status'];
 
    if($data['status']==1) {
        $status = "Aktif";
    } else {
        $status = "Tidak Aktif";
    }
 
//form tambah data
} else {
    $aktivitas ="";
    $deskripsi ="";
    $tanggal_deadline ="";
    $status = "";
}
 
?>
<form class="form-horizontal" id="form-CRUD">
    <div class="control-group">
        <label class="control-label" for="aktivitas">Aktivitas</label>
        <div class="controls">
            <input type="text" id="aktivitas" class="input-medium" name="aktivitas" value="<?php echo $aktivitas ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="deskripsi">Deskripsi</label>
        <div class="controls">
            <input type="text" id="deskripsi" class="input-xlarge" name="deskripsi" value="<?php echo $deskripsi ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tanggal_deadline">Tanggal Deadline</label>
        <div class="controls">
            <textarea id="tanggal_deadline" name="tanggal_deadline"><?php echo $tanggal_deadline ?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="status">Status</label>
        <div class="controls">
            <select class="input-medium" name="status">
                <?php
                // tampilkan untuk form ubah CRUD
                if($id > 0) { ?>
                    <option value="<?php echo $kd_status ?>"><?php echo $status ?></option>
                <?php } ?>
                <option value="1">Selesai</option>
                <option value="0">Belum Selesai</option>
            </select>
        </div>
    </div>
</form>
 
<?php
// tutup koneksi ke database mysql
koneksi_tutup();
?>