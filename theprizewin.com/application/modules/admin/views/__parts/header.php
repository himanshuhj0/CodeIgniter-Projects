<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Administration Panel">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
        <script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
        <title>Admin Panel</title>
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://theprizewin.com">ThePrizeWin.com</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li<?= uri_string() == 'admin' ? ' class="active"' : ''; ?>><a href="<?= base_url('admin') ?>">Publish Prize</a></li>
                            <li<?= uri_string() == 'admin/edit' ? ' class="active"' : ''; ?>><a href="<?= base_url('admin/edit') ?>"  role="button" aria-expanded="false">Edit Prizes</a></li>
                            <li<?= uri_string() == 'admin/addwinner' ? ' class="active"' : ''; ?>><a href="<?= base_url('admin/addwinner') ?>">Publish Winner</a></li>
                            <li<?= uri_string() == 'admin/editwinners' ? ' class="active"' : ''; ?>><a href="<?= base_url('admin/editwinners') ?>"  role="button" aria-expanded="false">Edit Winners</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?= base_url('admin/logout') ?>"  role="button" aria-expanded="false">Logout</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </div>

