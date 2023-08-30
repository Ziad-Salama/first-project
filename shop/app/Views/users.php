<?= $this->extend('layout/users/master') ?>

<?= $this->section('body-content') ?>

<div class="container-fluid py-4">

    <!-- modal user add -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control first-name" placeholder="First Name" name="first-name">
                        <span id="error_firstname" class="text-danger"></span>
                        <?php
                        if (isset($validation)) {
                            if ($validation->hasError('first-name')) {
                                echo $validation->getError('first-name');
                            }
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control last-name" placeholder="Last Name" name="last-name">
                        <span id="error_lastname" class="text-danger"></span>
                        <?php
                        if (isset($validation)) {
                            if ($validation->hasError('last-name')) {
                                echo $validation->getError('last-name');
                            }
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control email" placeholder="Email" name='email'>
                        <span id="error_email" class="text-danger"></span>
                        <?php
                        if (isset($validation)) {
                            if ($validation->hasError('email')) {
                                echo $validation->getError('email');
                            }
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control password" placeholder="Password" name='password'>
                        <span id="error_password" class="text-danger"></span>
                        <?php
                        if (isset($validation)) {
                            if ($validation->hasError('password')) {
                                echo $validation->getError('password');
                            }
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Position</label>
                        <select class="form-control postion" name="postion">
                            <option value="">Select Position</option>
                            <option value="manager">Manager</option>
                            <option value="developer">Developer</option>
                            <option value="designer">Designer</option>
                            <option value="hr">HR</option>
                            <option value="accounting">Accounting</option>
                            <option value="employee">employee</option>
                            <!-- Add more options as needed -->
                        </select>
                        <span id="error_postion" class="text-danger"></span>
                        <?php
                        if (isset($validation)) {
                            if ($validation->hasError('postion')) {
                                echo $validation->getError('postion');
                            }
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rank</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rank" id="admin" value="1">
                            <label class="form-check-label" for="admin">
                                Admin
                            </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="rank" id="user" value="0">
                            <label class="form-check-label" for="user">
                                User
                            </label>
                        </div>
                        <span id="error_rank" class="text-danger"></span>
                        <?php
                        if (isset($validation)) {
                            if ($validation->hasError('rank')) {
                                echo $validation->getError('rank');
                            }
                        }
                        ?>
                        <?php
                        if (isset($error)) {
                        ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php

                        } elseif (isset($success)) {
                        ?>
                            <div class="alert alert-success" role="alert"><?= $success ?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ajaxuser-save">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal user view -->
    <div class="modal fade" id="userView" tabindex="-1" aria-labelledby="userViewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userViewLabel">View User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>ID: <span class="id-view"></span></h4>
                    <h4>First Name: <span class="first-name-view"></span></h4>
                    <h4>Last Name: <span class="last-name-view"></span></h4>
                    <h4>Email: <span class="email-view"></span></h4>
                    <h4>Position: <span class="postion-view"></span></h4>
                    <h4>Rank: <span class="rank-view"></span></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- modal user edit -->
    <div class="modal fade" id="userEdit" tabindex="-1" aria-labelledby="userEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userEditLabel">Edit User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user-id" class="form-control user-id" name="user-id">
                    <div class="mb-3">
                        <label class="form-label">First name</label>
                        <input type="text" id="first-name" class="form-control first-name" name="first-name">
                        <span id="error_firstname" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last name</label>
                        <input type="text" id="last-name" class="form-control last-name" name="last-name">
                        <span id="error_lastname" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" class="form-control email" name="email">
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" id="password" class="form-control password" name="password">
                        <span id="error_password" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Position</label>
                        <select class="form-control postion" name="postion" id="postion">
                            <option value="">Select Position</option>
                            <option value="manager">Manager</option>
                            <option value="developer">Developer</option>
                            <option value="designer">Designer</option>
                            <option value="hr">HR</option>
                            <option value="accounting">Accounting</option>
                            <option value="employee">employee</option>
                        </select>
                        <span id="error_postion" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rank</label>
                        <div class="form-check">
                            <input class="form-check-input admin" type="radio" name="rank" id="admin" value="1">
                            <label class="form-check-label" for="admin">
                                Admin
                            </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input user" type="radio" name="rank" id="user" value="0">
                            <label class="form-check-label" for="user">
                                User
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ajaxuser-update">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal user delete -->
    <div class="modal fade" id="userDelete" tabindex="-1" aria-labelledby="userDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="userDeleteLabel">View User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="user-id" name="id" id="user-id">
                    <h4>Are You Sure For Delete</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ajaxuser-delete">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- the button add user -->
    <?php
    if (session('id') == 1) { ?>
        <button class="btn btn-info"><a href="" data-bs-toggle="modal" data-bs-target="#userModal">Add User</a></button>
    <?php
    }
    ?>

    <!-- main page -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 p-3">
                        <table class="table" id="mydatatable">
                            <thead>
                                <tr>
                                    <th class='text-center' scope="col">id</th>
                                    <th class='text-center' scope="col">First Name</th>
                                    <th class='text-center' scope="col">Last Name</th>
                                    <th class='text-center' scope="col">Email</th>
                                    <th class='text-center' scope="col">Postion</th>
                                    <th class='text-center' scope="col">Rank</th>
                                    <th class='text-center' scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="userdata">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>


    <?= $this->section('script') ?>


    <?= $this->endSection(); ?>