<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('admin/css/login.css')?>">
    <title></title>
  </head>
  <body>

    <div class="background"></div>

    <div class="box">

      <div class="container">

        <div class="row">
          <div class="col-sm" style="margin-left: 40px">
            <div class="logo">
              <img src="<?= base_url('admin/image/logo.png')?>" alt="">
              <h3>DISPERTARU DIY</h3>
            </div>
          </div>

          <div class="col-sm" style="margin-right: -100px">
          </div>

          <div class="col-sm">
            <form action="<?= url_to('validLogin') ?>" class="login" method="post">
                <?= csrf_field() ?>
              <h3>Log In</h3>
              <?php if (session()->has('message')) : ?>
                <div class="alert alert-success">
                  <?= session('message') ?>
                </div>
              <?php endif ?>

              <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger">
                  <?= session('error') ?>
                </div>
              <?php endif ?>

              <?php if (session()->has('errors')) : ?>
                <ul class="alert alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                  <li><?= $error ?></li>
                <?php endforeach ?>
                </ul>
              <?php endif ?>
              <label for="">E-mail</label>
              <input type="text" name="username">
              <label for="">Password</label>
              <input type="password" name="password">
              <a href="#">
                <p class="pass">Forgot password</p>
              </a>
              <button type="submit" name="button">Login</button>
            </form>
          </div>
        </div>

      </div>

    </div>

  </body>
</html>
