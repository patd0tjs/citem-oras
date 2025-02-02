<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#new_user">
        Create new user
    </button>

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
                            <td><?= $user['email']?></td>
                            <td>
                                <?php if($user['is_active'] == 1){?>
                                    <a class="btn btn-success" href="<?= base_url()?>admin/users/status?id=<?= $user['id']?>&status=0" role="button">Active</a>
                                <?php } else {?>
                                    <a class="btn btn-secondary" href="<?= base_url()?>admin/users/status?id=<?= $user['id']?>&status=1" role="button">Inctive</a>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#edit<?=$user['id']?>">
                                    Edit
                                </button>
                            </td>
                        </tr>    

                        <div class="modal fade" id="edit<?= $user['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url()?>admin/users/update" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?= $user['email']?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Update Password</label>
                                                <input type="password" class="form-control" name="pw">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="<?= $user['id']?>">
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

    <div class="modal fade" id="new_user" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= base_url()?>admin/users/new" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="pw" required>
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