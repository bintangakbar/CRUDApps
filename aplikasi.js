(function($) {
    // fungsi dijalankan setelah seluruh dokumen ditampilkan
    $(document).ready(function(e) {
         
        // deklarasikan variabel
        var id = 0;
        var main = "CRUD.data.php";
         
        // tampilkan data CRUD dari berkas CRUD.data.php 
        // ke dalam <div id="data-CRUD"></div>
        $("#data-CRUD").load(main);
         
        // ketika tombol ubah/tambah di tekan
        $('.ubah, .tambah').live("click", function(){
             
            var url = "CRUD.form.php";
            // ambil nilai id dari tombol ubah
            id = this.id;
             
            if(id != 0) {
                // ubah judul modal dialog
                $("#myModalLabel").html("Ubah Data");
            } else {
                $("#myModalLabel").html("Tambah Data");
            }
 
            $.post(url, {id: id} ,function(data) {
                // tampilkan CRUD.form.php ke dalam <div class="modal-body"></div>
                $(".modal-body").html(data).show();
            });
        });
         
        // ketika tombol hapus ditekan
        $('.hapus').live("click", function(){
            var url = "CRUD.input.php";
            // ambil nilai id dari tombol hapus
            id = this.id;
             
            // tampilkan dialog konfirmasi
            var answer = confirm("Apakah anda ingin mengghapus data ini?");
             
            // ketika ditekan tombol ok
            if (answer) {
                // mengirimkan perintah penghapusan ke berkas transaksi.input.php
                $.post(url, {hapus: id} ,function() {
                    // tampilkan data yang sudah di perbaharui
                    // ke dalam <div id="data-CRUD"></div>
                    $("#data-CRUD").load(main);
                });
            }
        });
         
        // ketika tombol simpan ditekan
        $("#simpan-CRUD").bind("click", function(event) {
            var url = "CRUD.input.php";
 
            // mengambil nilai dari inputbox, textbox dan select
            var v_aktivitas = $('input:text[name=aktivitas]').val();
            var v_deskripsi = $('input:text[name=deskripsi]').val();
            var v_tanggal_deadline = $('select[name=deadline]').val();
            var v_status = $('select[name=status]').val();
 
            // mengirimkan data ke berkas transaksi.input.php untuk di proses
            $.post(url, {aktivitas: v_aktivitas, deskripsi: v_deskripsi, tanggal_deadline: v_tanggal_deadline, status: v_status, id: id} ,function() {
                // tampilkan data CRUD yang sudah di perbaharui
                // ke dalam <div id="data-CRUD"></div>
                $("#data-CRUD").load(main);
 
                // sembunyikan modal dialog
                $('#dialog-CRUD').modal('hide');
                 
                // kembalikan judul modal dialog
                $("#myModalLabel").html("Tambah Data CRUD");
            });
        });
    });
}) (jQuery);