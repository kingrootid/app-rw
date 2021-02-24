<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-square"></i> Tambah Data</button>
        <div class="table-responsive">
            <table class="table table-striped" id="data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Banned</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Banned</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- MODAL ADD -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalAdd" style="z-index: 1;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD -->
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#data').DataTable({
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
    });
</script>