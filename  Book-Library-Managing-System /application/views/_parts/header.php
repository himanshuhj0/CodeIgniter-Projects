<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Library Managing</title>
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/mine.css') ?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?= base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    </head>
    <body>
        <div class="container">
            <?php if (isset($this->session->userdata['logged_in'])) { ?>
                <div id="header-bg"></div>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Book Library</a>
                        </div>
                        <div>
                            <ul class="nav navbar-nav">
                                <li <?= $this->uri->segment(1)=='home'?'class="active"':'' ?>><a href="<?= base_url('home') ?>">Начало</a></li>
                                <li <?= $this->uri->segment(1)=='users'?'class="active"':'' ?>><a href="<?= base_url('users') ?>">Потребители</a></li>
                                <li <?= $this->uri->segment(1)=='books'?'class="active"':'' ?>><a href="<?= base_url('books') ?>">Книги</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?= base_url('login/logout') ?>"><span class="glyphicon glyphicon-log-out"> Изход</span></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            <?php } ?>