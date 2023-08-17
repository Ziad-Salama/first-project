<?php

$this->extend('layout/login/master');

$this->section('body-content');


?>
<div class="container">
  <input type="checkbox" id="flip">
  <div class="cover">
    <div class="front">
      <img src="<?= base_url('image/frontImg.jpg') ?>" alt="">
      <div class="text">
        <span class="text-1">Every new friend is a <br> new adventure</span>
        <span class="text-2">Let's get connected</span>
      </div>
    </div>
    <div class="back">
      <img class="backImg" src="<?= base_url('image/backImg.jpg') ?>" alt="">

      <div class="text">
        <span class="text-1">Complete miles of journey <br> with one step</span>
        <span class="text-2">Let's get started</span>
      </div>
    </div>
  </div>
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
            <div class="text"><a href="#">Forgot password?</a></div>
            <div class="button input-box">
              <input type="submit" value="Sumbit">
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php $this->endSection(); ?>