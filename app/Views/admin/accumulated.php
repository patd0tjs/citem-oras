<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>Total Accumulated Hours</th>
                        <th>Remaining Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($hours as $hour):?>
                        <tr>
                            <td><?= $hour['name']?></td>
                            <td><?= $hour['start_date']?></td>
                            <td><?= $hour['hours'] - $hour['dtr_count']?></td>
                            <td><?= $hour['required_hours'] - $hour['hours'] + $hour['dtr_count']?></td>
                        </tr>    
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>