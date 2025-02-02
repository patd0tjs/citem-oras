<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Total Accumulated Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($hours as $hour):?>
                        <tr>
                            <td><?= $hour['name']?></td>
                            <td><?= $hour['hours']?></td>
                        </tr>    
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>