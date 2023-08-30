<?php

$this->extend('layout/login/master');

$this->section('body-content');


?>
<div class="container">
  <div class="cover">
    <div class="front">
      <img src="<?= base_url('image/frontImg.jpg') ?>" alt="">
    </div>
  </div>

  <!-- login form -->
  <div class="forms">
    <div class="form-content">
      <div class="login-form">
        <div class="title">Login</div>
        <form action="<?= base_url('login') ?>" method="post">
          <?= csrf_field() ?>
          <div class="input-boxes">
            <div class="input-box">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <p>
              <?php
              if (isset($validation)) {
                if ($validation->hasError('email')) {
                  echo $validation->getError('email');
                }
              }
              ?>
            </p>
            <div class="input-box">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <p>
              <?php
              if (isset($validation)) {
                if ($validation->hasError('password')) {
                  echo $validation->getError('password');
                }
              }
              ?>
            </p>
            <div class="button input-box">
              <input type="submit" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection(); ?>