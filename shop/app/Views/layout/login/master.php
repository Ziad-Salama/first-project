<?php $pageName = 'Login' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageName) ? $pageName : 'Page' ?></title>

    <!-- header links -->
    <?= $this->include('partial/login/header.php'); ?>

</head>

<body>

    <?= $this->renderSection('body-content'); ?>

</body>

</html>