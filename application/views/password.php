<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Generate API Keys
            </div>
            <div class="card-body">
                <input type="hidden" id="users_id" value="<?php echo $user['id']; ?>">
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" id="npass" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password Konfirmasi</label>
                    <input type="password" id="cnpass" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password Saat Ini</label>
                    <input type="password" id="pass" class="form-control">
                </div>
                <button id="change" class="btn btn-info">Ganti Password</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#change").click(function() {
        $.ajax({
            type: "POST",
            data: {
                id: $("#users_id").val(),
                npass: $("#npass").val(),
                cnpass: $("#cnpass").val(),
                pass: $("#pass").val(),
                <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
            },
            url: "<?php echo base_url('users/dopassword'); ?>",
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