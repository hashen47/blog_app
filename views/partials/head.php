<?php 

    $cssLinks = [];
    $jsLinks = [];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require "css.php" ?>

    <?php foreach($cssLinks as $link) : ?>
        <?= linkCss($link); ?>
    <?php endforeach; ?>

    <title><?= $title; ?></title>
</head>
<body>