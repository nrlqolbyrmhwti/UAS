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
                    <?php if(validation_errors()){
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>  
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if(session()->getFlashdata('error')){
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-warning"></i> Error</h5>  
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php
                    }
                    ?>

                    <?php echo csrf_field() ?>
                    <?php 
                        if (current_url(true)->getSegment(2) == 'edit') {
                            ?>
                            <input type="hidden" name="param" id="param" value="<?php echo $edit_data ['Id_anggota']; ?>">
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <label for="id_anggota">Id_Anggota</label>
                        <input type="text" name="id_anggota" id="id_anggota" value="<?php echo empty(set_value('id_anggota')) ? (empty($edit_data['id_anggota']) ? "":$edit_data['id_anggota']) : set_value('id_anggota') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?php echo empty(set_value('nama')) ? (empty($edit_data['nama']) ? "":$edit_data['nama']) : set_value('nama') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <input type="text" name="prodi" id="prodi" value="<?php echo empty(set_value('prodi')) ? (empty($edit_data['prodi']) ? "":$edit_data['prodi']) : set_value('prodi') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fakulltas">Fakultas</label>
                        <input type="text" name="fakulltas" id="fakulltas" value="<?php echo empty(set_value('fakulltas')) ? (empty($edit_data['fakulltas']) ? "":$edit_data['fakulltas']) : set_value('fakulltas') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>                                  
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>        
    </div>
</div>
<?php
echo $this->endSection();
