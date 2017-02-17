<?php
//TODO: Add PHP Logic to handle the active navbar and breadcrumbs
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"
          crossorigin="anonymous">
    <link href="css/site.css">

    <script src="//code.jquery.com/jquery-2.2.0.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"
            crossorigin="anonymous"></script>
    <?= function_exists('headerExtra') ? headerExtra() : "" ?>
</head>
<body>
<div class="container">
<!--Header End-->
