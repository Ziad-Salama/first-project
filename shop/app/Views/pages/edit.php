<?= $this->extend('layout/users/master') ?>
<?= $this->section('body-content') ?>

<body class="">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>update</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('update/' . $data['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="First Name" name="first-name" value="<?= $data['first-name'] ?>">
                                    <?php
                                    if (isset($validation)) {
                                        if ($validation->hasError('first-name')) {
                                            echo $validation->getError('first-name');
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last-name" value="<?= $data['last-name'] ?>">
                                    <?php
                                    if (isset($validation)) {
                                        if ($validation->hasError('last-name')) {
                                            echo $validation->getError('last-name');
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" name='email' value="<?= $data['email'] ?>">
                                    <?php
                                    if (isset($validation)) {
                                        if ($validation->hasError('email')) {
                                            echo $validation->getError('email');
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" name="postion">
                                        <option value="manager" <?= ($data['postion'] === 'manager') ? 'selected' : '' ?>>Manager</option>
                                        <option value="developer" <?= ($data['postion'] === 'developer') ? 'selected' : '' ?>>Developer</option>
                                        <option value="designer" <?= ($data['postion'] === 'designer') ? 'selected' : '' ?>>Designer</option>
                                        <option value="hr" <?= ($data['postion'] === 'hr') ? 'selected' : '' ?>>HR</option>
                                        <option value="acounting" <?= ($data['postion'] === 'acounting') ? 'selected' : '' ?>>Acounting</option>
                                        <option value="employee" <?= ($data['postion'] === 'employee') ? 'selected' : '' ?>>Employee</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <?php
                                    if (isset($validation)) {
                                        if ($validation->hasError('postion')) {
                                            echo $validation->getError('postion');
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rank" id="admin" value="1" <?= ($data['rank'] === '1') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="admin">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rank" id="user" value="0" <?= ($data['rank'] === '0') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="user">
                                            User
                                        </label>
                                    </div>

                                    <?php
                                    if (isset($validation)) {
                                        if ($validation->hasError('rank')) {
                                            echo $validation->getError('rank');
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Update" type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= $this->endSection() ?>