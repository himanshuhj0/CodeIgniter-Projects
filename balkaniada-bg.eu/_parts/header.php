<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mine.css?v5">
        <script src="js/jquery.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-5" style="padding-top:30px">
                    <img src="imgs/logo.jpg">
                    <p style="font-size:18px;">Доставка на хранителни продукти от България</p>
                </div>
                <div class="col-sm-7">
                    <ul class="nav nav-tabs">
                        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/index.php' ? 'active-me' : '' ?>" href="index.php">Начало</a></li>
                        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/products.php' ? 'active-me' : '' ?>" href="products.php">Продукти</a></li>
                        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/about-us.php' ? 'active-me' : '' ?>" href="about-us.php">Как да поръчам?</a></li>
                        <!-- <li><a class="<?= $_SERVER['REQUEST_URI'] == '/novi_predlojeniq.php' ? 'active-me' : '' ?>" href="novi_predlojeniq.php">Новите ни предложения</a></li>  -->
                        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/contact.php' ? 'active-me' : '' ?>" href="contact.php">Контакти</a></li>
                    </ul>
                </div>
            </div>
        </div>
