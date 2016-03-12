<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= $header['description']; ?>">
        <meta name="keywords" content="<?= $header['keywords']; ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
        <title><?= $header['title']; ?></title>
    </head>
    <body>
        <div class="container">
            <ul class="nav nav-tabs hidden-xs">
                <li role="presentation"<?php if (uri_string() == '') echo ' class="active"'; ?>><a href="<?= base_url() ?>">Competitions</a></li>
                <li role="presentation"<?php if (uri_string() == 'buyandgetfree') echo ' class="active"'; ?>><a href="<?= base_url('buyandgetfree') ?>">Buy and Get free</a></li>
                <li role="presentation"<?php if (uri_string() == 'discount') echo ' class="active"'; ?>><a href="<?= base_url('discount') ?>">Discount</a></li>
                <li role="presentation"<?php if (uri_string() == 'howtowin') echo ' class="active"'; ?>><a href="<?= base_url('howtowin') ?>">How to Win</a></li>
                <li role="presentation"<?php if (uri_string() == 'latestwinners') echo ' class="active"'; ?>><a href="<?= base_url('latestwinners') ?>">Latest Winners</a></li>
                <li role="presentation"<?php if (uri_string() == 'termsandconditions') echo ' class="active"'; ?>><a href="<?= base_url('termsandconditions') ?>">Terms and Conditions</a></li>
                <li role="presentation"<?php if (uri_string() == 'aboutus') echo ' class="active"'; ?>><a href="<?= base_url('aboutus') ?>">About Us</a></li>
            </ul>
            <ul class="nav nav-pills visible-xs small_menu">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        Menu <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"<?php if (uri_string() == '') echo ' class="active"'; ?>><a href="<?= base_url(); ?>">Competitions</a></li>
                        <li role="presentation"<?php if (uri_string() == 'buyandgetfree') echo ' class="active"'; ?>><a href="<?= base_url('buyandgetfree') ?>">Buy and Get free</a></li>
                        <li role="presentation"<?php if (uri_string() == 'discount') echo ' class="active"'; ?>><a href="<?= base_url('discount') ?>">Discount</a></li>
                        <li role="presentation"<?php if (uri_string() == 'howtowin') echo ' class="active"'; ?>><a href="<?= base_url('howtowin') ?>">How to Win</a></li>
                        <li role="presentation"<?php if (uri_string() == 'latestwinners') echo ' class="active"'; ?>><a href="<?= base_url('latestwinners') ?>">Latest Winners</a></li>
                        <li role="presentation"<?php if (uri_string() == 'termsandconditions') echo ' class="active"'; ?>><a href="<?= base_url('termsandconditions') ?>">Terms and Conditions</a></li>
                        <li role="presentation"<?php if (uri_string() == 'aboutus') echo ' class="active"'; ?>><a href="<?= base_url('aboutus') ?>">About Us</a></li>
                    </ul>
                </li>
            </ul>
            <div class="row header-center">
                <div class="col-sm-6">
                    <h3>ThePrizeWin.com</h3>
                    <h4>World N1! All presents in one place! Buy-Win!</h4>
                </div>
                <div class="col-sm-6 index-page-r">
                    <div class="right"><div>
                            <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSpend2win%3Ffref%3Dts&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:65px;" allowTransparency="true"></iframe></div>
                    </div>
                </div>
            </div>
            <hr>
