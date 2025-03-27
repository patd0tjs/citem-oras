<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#create">
        Add school
    </button>

    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($schools as $school):?>
                        <tr>
                            <td><?= $school['name']?></td>
                            <td>
                                <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#edit<?=$school['id']?>">
                                    Edit
                                </button>
                            </td>
                        </tr>   
                        
                        <div class="modal fade" id="edit<?= $school['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url()?>admin/schools/update" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit School</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="<?= $school['name']?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="<?= $school['id']?>">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= base_url()?>admin/schools/create" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit School</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>