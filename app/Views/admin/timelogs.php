<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.1/r-3.0.3/sc-2.4.3/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.1/r-3.0.3/sc-2.4.3/datatables.min.js"></script>

    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Task</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($timelogs as $log):?>
                        <tr>
                            <td><?= $log['name']?></td>
                            <td><?= $log['date']?></td>
                            <td><?= $log['time_in']?></td>
                            <td><?= $log['time_out']?></td>
                            <td><?= $log['task']?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $log['id']?>">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        
                        <!-- not efficient, but quick to develop -->
                        <div class="modal fade" id="edit<?= $log['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="<?= base_url()?>admin/updateTimelog" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Timelog</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Time In</label>
                                                <input type="time" class="form-control" name="time_in" value="<?=$log['time_in']?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Time Out:</label>
                                                <input type="time" class="form-control" name="time_out" value="<?=$log['time_out']?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="<?=$log['id']?>">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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