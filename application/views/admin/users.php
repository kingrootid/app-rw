<div class="row">
    <div class="col-12">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">
            <i class="fas fa-plus-square"></i> Tambah Data
        </button>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $page; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Banned ?</th>
                                <th>Admin ?</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Banned ?</th>
                                <th>Admin ?</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label>Admin ?</label>
                        <select class="form-control" id="admin">
                            <option value="tdk">Tidak</option>
                            <option value="ya">Ya</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="add" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->
<!-- MODAL EDIT -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_id">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="edit_nama">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="edit_email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="edit_password">
                    <small style="color: red;">*Silahakan isi bidang ini jika ingin mengganti password user</small>
                </div>
                <div class="form-group">
                    <label>Banned ?</label>
                    <select class="form-control" id="edit_banned">
                        <option value="tdk">Tidak</option>
                        <option value="ya">Ya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Admin ?</label>
                    <select class="form-control" id="edit_admin">
                        <option value="tdk">Tidak</option>
                        <option value="ya">Ya</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="edit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL EDIT -->
<!-- MODAL DELETE -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hapus_id">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="hapus_nama" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="hapus_email" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="hapus_password" readonly>
                    <small style="color: red;">*Silahakan isi bidang ini jika ingin mengganti password user</small>
                </div>
                <div class="form-group">
                    <label>Banned ?</label>
                    <select class="form-control" id="hapus_banned" disabled>
                        <option value="tdk">Tidak</option>
                        <option value="ya">Ya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Admin ?</label>
                    <select class="form-control" id="hapus_admin" disabled>
                        <option value="tdk">Tidak</option>
                        <option value="ya">Ya</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="hapus" class="btn btn-danger">Delete Data</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL DELETE -->
<script>
    function edit(id) {
        $("#editModal").modal('show');
        $.ajax({
            url: '<?php echo base_url('admin/duser'); ?>',
            data: {
                id: id,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                $("#edit_id").val(data.id);
                $("#edit_nama").val(data.nama);
                $("#edit_email").val(data.email);
                if (data.banned == 0 && data.admin) {
                    var admin = "tdk";
                } else {
                    var admin = "ya";
                }
                $("#edit_banned").val(admin);
                $("#edit_admin").val(admin);
            },
            error: function(data) {
                toastr.error('Data tidak ditemukan');
                $("#editModal").modal('hide');
            }
        });
    }

    function hapus(id) {
        $("#hapusModal").modal('show');
        $.ajax({
            url: '<?php echo base_url('admin/duser'); ?>',
            data: {
                id: id,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                $("#hapus_id").val(data.id);
                $("#hapus_nama").val(data.nama);
                $("#hapus_email").val(data.email);
                if (data.banned == 0 && data.admin) {
                    var admin = "tdk";
                } else {
                    var admin = "ya";
                }
                $("#hapus_banned").val(admin);
                $("#hapus_admin").val(admin);
            },
            error: function(data) {
                toastr.error('Data tidak ditemukan');
                $("#hapusModal").modal('hide');
            }
        });
    }
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "language": {
                "emptyTable": "Data tidak ada",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Lanjut",
                    "previous": "Kembali"
                },
                "processing": "Mohon tunggu data sedang diload"
            },
            "ajax": "<?php echo base_url('admin/datausers/'); ?>"
        });
        $("#add").click(function() {
            $.ajax({
                type: "POST",
                data: {
                    nama: $("#nama").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    admin: $("#admin").val(),
                    <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
                },
                url: "<?php echo base_url('admin/doadd_user'); ?>",
                success: function(data) {
                    if (data.error == false) {
                        $("#addForm")[0].reset();
                        toastr.success(data.message);
                        $("#addModal").modal('hide');
                        table.ajax.reload();
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        })
        $("#edit").click(function() {
            $.ajax({
                type: "POST",
                data: {
                    id: $("#edit_id").val(),
                    nama: $("#edit_nama").val(),
                    email: $("#edit_email").val(),
                    password: $("#edit_password").val(),
                    admin: $("#edit_admin").val(),
                    banned: $("#edit_banned").val(),
                    <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
                },
                url: "<?php echo base_url('admin/doedit_user'); ?>",
                success: function(data) {
                    if (data.error == false) {
                        toastr.success(data.message);
                        $("#editModal").modal('hide');
                        table.ajax.reload();
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        })
        $("#hapus").click(function() {
            $.ajax({
                type: "POST",
                data: {
                    id: $("#hapus_id").val(),
                    <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
                },
                url: "<?php echo base_url('admin/dohapus_user'); ?>",
                success: function(data) {
                    if (data.error == false) {
                        toastr.success(data.message);
                        $("#hapusModal").modal('hide');
                        table.ajax.reload();
                    } else {
                        toastr.error(data.message);
                    }
                }
            });
        })
    });
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