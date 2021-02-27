<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Generate API Keys
            </div>
            <div class="card-body">
                <input type="hidden" id="users_id" value="<?php echo $user['id']; ?>">
                <?php if ($api_key->num_rows() < 1) { ?>
                    <label class="badge badge-danger">API Key anda belum diset. Mohon Klik Reset Key Dahulu</label>
                    <?} else { ?>
                    <input type="text" class="form-control mb-3" id="key" placeholder="api_key" readonly>
                <?php } ?>
                <button id="reset" class="btn btn-info">Reset Key</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#reset").click(function() {
        $.ajax({
            type: "POST",
            data: {
                id: $("#users_id").val(),
                <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
            },
            url: "<?php echo base_url('users/generate'); ?>",
            success: function(data) {
                if (data.error == false) {
                    toastr.success(data.message);
                    $("#key").val(data.key);
                } else {
                    toastr.error(data.message);
                }
            }
        });
    })
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