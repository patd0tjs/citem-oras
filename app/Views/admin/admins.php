<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.1/r-3.0.3/sc-2.4.3/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.1/r-3.0.3/sc-2.4.3/datatables.min.js"></script>

    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user):?>
                        <tr>
                            <td><?= $user['name']?></td>
                            <td><?= $user['hours']?></td>
                        </tr>    
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        new DataTable("#datatable", {
            order: []
        });
    </script>
<?= $this->endSection() ?>