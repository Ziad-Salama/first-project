<?php
$pageName = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageName) ? $pageName : 'Page' ?></title>

    <!-- header links -->
    <?= $this->include('partial/dashboard/header'); ?>

</head>

<body class="g-sidenav-show   bg-gray-100">
    <!-- main body content -->
    <?= $this->renderSection('body-content'); ?>
</body>

</html>