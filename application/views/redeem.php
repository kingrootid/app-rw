<?php
if ($poin->num_rows() < 1) { ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Wah ...</h4>
        <p>Anda belum Memiliki poin, silahakan transaksi dahulu.</p>
        <hr>
        <a href="<?php echo base_url('transaction/new'); ?>">Klik disini untuk transaksi</a>
    </div>
<?php } else {
    $dpoin = $poin->row_array();
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Hebat</h4>
        <p>Anda memiliki poin sebanyak <?php echo $dpoin['total']; ?>.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
    <div class="row">
        <?php
        $list = $this->db->get('rewards')->result_array();
        foreach ($list as $rewards) { ?>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo base_url("upload/rewards/" . $rewards['foto'] . ""); ?>" class="card-img-top" alt="<?php echo $rewards['nama']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rewards['nama']; ?></h5>
                            <p class="card-text">Minimal Poin : <?php echo $rewards['min']; ?></p>
                            <a href="javascript:;" onclick="redeem(<?php echo $rewards['id']; ?>)" class="btn btn-primary">Tukarkan</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
} ?>
<script>
    function redeem(id) {
        alert('Click ' + id);
    }
</script>