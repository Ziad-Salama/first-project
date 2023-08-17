<?= $this->extend('layout/dashboard/master') ?>
<?= $this->section('body-content') ?>
<div class="container-fluid py-4">
    <?php
    if (session('id') == 1) { ?>
        <button class="btn btn-info"><a href="<?= base_url('add-user') ?>">Add User</a></button>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $user['first-name'] . ' ' . $user['last-name'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['postion'] ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm"><?= $user['email'] ?></td>
                                        <?php
                                        if (session('id') == 1) {
                                        ?>
                                            <td class="align-middle">
                                                <a href="<?= base_url("edit/$user[id]") ?>" class="text-secondary font-weight-bold text-xs edit-button">
                                                    Edit |
                                                </a>
                                                <a href="<?= base_url("delete/$user[id]") ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    delete
                                                </a>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>