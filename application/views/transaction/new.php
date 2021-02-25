<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <?php echo $page; ?>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('transaction/donew'); ?>">
                <div class="card-body">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="form-group">
                        <label>Product</label>
                        <select class="form-control js-example-basic-single" name="prod_id">
                            <option value="null">Silahkan Pilih Product</option>
                            <?php foreach ($product as $dprod) { ?>
                                <option value="<?php echo $dprod['id']; ?>"><?php echo $dprod['nama']; ?> (Tersedia <i><?php echo $dprod['sisa_product']; ?></i>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-success">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>