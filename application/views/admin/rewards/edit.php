<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"><?php echo $page; ?></h5>
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url('admin/doedit_rewards'); ?>">
                <div class="card-body">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <input type="hidden" name="id" value="<?php echo $rewards['id']; ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $rewards['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Gambar Hadiah</label>
                        <input type="file" class="form-control" name="file">
                        <small style="color: red;">Pilih Gambar Lain jika ingin mengganti Gambar dari Rewards Ini</small>
                    </div>
                    <div class="form-group">
                        <label>Minimal Poin</label>
                        <input type="number" class="form-control" name="min" value="<?php echo $rewards['min']; ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('admin/rewards'); ?>" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                    <button type="reset" class="btn btn-danger float-right mr-3">Reset Data</button>
                </div>
            </form>
        </div>
    </div>
</div>