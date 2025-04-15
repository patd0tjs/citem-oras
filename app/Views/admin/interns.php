<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#new_user">
        Create new intern
    </button>

    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School</th>
                        <th>Start Date</th>
                        <th>Total Hours</th>
                        <th>Rendered Hours</th>
                        <th>Remaining Hours</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ledger_details as $ledger_detail):?>
                        <tr>
                            <td><?= $ledger_detail['name']?></td>
                            <td><?= $ledger_detail['school']?></td>
                            <td><?= $ledger_detail['start_date']?></td>
                            <td><?= $ledger_detail['total_hours']?></td>
                            <td><?= $ledger_detail['rendered_hours']?></td>
                            <td><?= $ledger_detail['total_hours'] - $ledger_detail['rendered_hours']?></td>
                            <td><?= $ledger_detail['department']?></td>
                            <td>
                                <?php if($ledger_detail['is_active'] == 1){?>
                                    <a class="btn btn-success" href="<?= base_url()?>admin/interns/status?id=<?= $ledger_detail['id']?>&status=0" role="button">Active</a>
                                <?php } else {?>
                                    <a class="btn btn-secondary" href="<?= base_url()?>admin/interns/status?id=<?= $ledger_detail['id']?>&status=1" role="button">Inctive</a>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#edit<?=$ledger_detail['id']?>">
                                    Edit/View Profile
                                </button>
                            </td>
                        </tr>    
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="new_user" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= base_url()?>admin/interns/new" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Intern</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Photo *</label>
                            <br>
                            <input type="file" class="form-label" name="img" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">School *</label>
                            <select name="school_id" class="form-control" required>
                                <option value="" selected hidden disabled>Select a School</option>
                                <?php foreach($schools as $school):?>
                                    <option value="<?=$school['id']?>"><?=$school['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Course *</label>
                            <input type="text" class="form-control" name="course" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact *</label>
                            <input type="text" class="form-control" name="contact" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Required Hours *</label>
                            <input type="number" class="form-control" name="req_hrs" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department *</label>
                            <input type="text" class="form-control" name="department" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Start Date *</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">End Date *</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username *</label>
                            <input type="username" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Create Password *</label>
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

    <?php foreach($users as $user):?>
        <div class="modal fade" id="edit<?= $user['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?= base_url()?>admin/interns/update" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?= $user['name']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="<?= base_url() . 'uploads/' . $user['img']?>" class="img-thumbnail">
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <br>
                                <input type="file" class="form-label" name="img" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" value="<?= $user['name']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">School *</label>
                                <select name="school_id" class="form-control" required>
                                    <option value="" selected hidden disabled>Select a School</option>
                                    <?php foreach($schools as $school):?>
                                        <option value="<?=$school['id']?>" <?= ($school['id'] == $user['school_id']) ? 'selected' : ''?>><?=$school['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Course *</label>
                                <input type="text" class="form-control" name="course" value="<?= $user['course']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" value="<?= $user['email']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact *</label>
                                <input type="text" class="form-control" name="contact" value="<?= $user['contact']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Required Hours *</label>
                                <input type="number" class="form-control" name="req_hrs" value="<?= $user['req_hrs']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Department *</label>
                                <input type="text" class="form-control" name="department" value="<?= $user['department']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Start Date *</label>
                                <input type="date" class="form-control" name="start_date" value="<?= $user['start_date']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">End Date *</label>
                                <input type="date" class="form-control" name="end_date" value="<?= $user['end_date']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username *</label>
                                <input type="username" class="form-control" name="username" value="<?= $user['username']?>" required>
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
<?= $this->endSection() ?>