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
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url("upload/rewards/" . $rewards['foto'] . ""); ?>" class="card-img-top" alt="<?php echo $rewards['nama']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rewards['nama']; ?></h5>
                        <p class="card-text">Minimal Poin : <?php echo $rewards['min']; ?></p>
                        <a href="javascript:;" onclick="redeem(<?php echo $rewards['id']; ?>)" class="btn btn-primary">Tukarkan</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
} ?>
<script>
    function redeem(id) {
        $.ajax({
            type: "POST",
            data: {
                id: id,
                user: '<?php echo $user['id']; ?>',
                <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
            },
            url: "<?php echo base_url('achievement/doredeem'); ?>",
            success: function(data) {
                if (data.error == false) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            }
        });
    }
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>