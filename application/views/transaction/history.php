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
                                <th>Product</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Tanggal</th>
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
<script>
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
            "ajax": "<?php echo base_url('transaction/datahistory/'); ?>"
        });

    });
</script>