<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>">
        <meta name="keywords" content="<?= $keywords ?>">
        <meta property="og:image" content="<?= base_url('assets/img/site-overview.png') ?>" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <header>
                    <div class="container">
                        <div>
                            <div class="pull-left">
                                <img src="<?= base_url('assets/img/logo.png') ?>" alt="Site Logo">
                            </div>
                            <div class="pull-right">
                                <form class="pull-left" id="search" method="GET" action="<?= base_url('search') ?>">
                                    <input type="text" class="search-field" name="search" placeholder="Search in side..">
                                    <a href="javascript:void(0);" onclick="document.getElementById('search').submit()" class="search-submit">Find</a>
                                </form>
                                <a href="" class="social">
                                    <img src="<?= base_url('assets/img/facebook.png') ?>" class="social" alt="social facebook">
                                </a>
                                <a href="" class="social">
                                    <img src="<?= base_url('assets/img/twitter.png') ?>" class="social" alt="social facebook">
                                </a>
                                <a href="" class="social">
                                    <img src="<?= base_url('assets/img/email.png') ?>" class="social" alt="social facebook">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <nav class="navbar">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?= base_url() ?>">Home</a></li>
                                    <li><a href="<?= base_url('LegalArticles') ?>">Legal articles</a></li>
                                    <li><a href="<?= base_url('Contacts') ?>">Contact</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li class="dropdown-header">Nav header</li>
                                            <li><a href="#">Separated link</a></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
