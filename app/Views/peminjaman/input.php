<?php
echo $this->extend('template/index');
echo $this->section('content');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
                <!-- /.card-header -->
                
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Id_anggota">Id_anggota</label>
                        <input type="Id_anggota" name="Id_anggota" id="Id_anggota" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Nama_Buku">Nama_Buku</label>
                        <input type="Nama_Buku" name="Nama_Buku" id="Nama_Buku" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Tanggal Peminjaman">Tanggal Peminjaman</label>
                        <input type="Tanggal Peminjaman" name="Tanggal Peminjaman" id="Tanggal Peminjaman" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Tanggal Pengembalian">Tanggal Pengembalian</label>
                        <input type="Tanggal Pengembalian" name="Tanggal Pengembalian" id="Tanggal Pengembalian" class="form-control" >
                </div>
                
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save</button>
                    </div>            
            </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();
