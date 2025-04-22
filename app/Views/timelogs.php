<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Task</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($timelogs as $timelog):?>
                        <tr>
                            <td><?= $timelog['date']?></td>
                            <td><?= $timelog['time_in']?></td>
                            <td><?= $timelog['time_out']?></td>
                            <td><?= $timelog['task']?></td>
                        </tr>    
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>