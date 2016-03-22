<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Администрация</title>
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap-select-1.9.4/css/bootstrap-select.min.css') ?>">
        <link href="<?= base_url('assets/css/custom-admin.css') ?>" rel="stylesheet">
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <?php if($this->session->userdata('logged_in')) { ?>
                    <nav class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" id="brand" href="#">Administration</a>
                        </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li class="active"><a href="<?= base_url('admin/profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                                <li class="active"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Open site</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?= base_url('admin/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </nav>
                <?php } ?>
                <div class="container-fluid">
                    <div class="row">
                        <?php if($this->session->userdata('logged_in')) { ?>
                            <div class="col-sm-3 col-md-2 left-side">
                                <ul class="sidebar-menu">
                                    <li class="header">MAIN NAVIGATION</li>
                                    <li><a href="<?= base_url('admin/publish') ?>" <?= urldecode(uri_string()) == 'admin/publish' ? 'class="active"' : '' ?>><i class="fa fa-edit"></i> Publish</a></li>
                                    <li><a href="<?= base_url('admin/articles') ?>" <?= urldecode(uri_string()) == 'admin/articles' ? 'class="active"' : '' ?>><i class="fa fa-files-o"></i> Articles</a></li>
                                    <li><a href="<?= base_url('admin/categories') ?>" <?= urldecode(uri_string()) == 'admin/categories' ? 'class="active"' : '' ?>><i class="fa fa-list-alt"></i> Categories</a></li>
                                    <li><a href="<?= base_url('admin/users') ?>" <?= urldecode(uri_string()) == 'admin/users' ? 'class="active"' : '' ?>><i class="fa fa-users"></i> Users</a></li>
                                    <li><a href="<?= base_url('admin/history') ?>" <?= urldecode(uri_string()) == 'admin/history' ? 'class="active"' : '' ?>><i class="fa fa-history"></i> History</a></li>
                                    <li><a href="<?= base_url('admin/filemanager') ?>" <?= urldecode(uri_string()) == 'admin/filemanager' ? 'class="active"' : '' ?>><i class="fa fa-file-code-o"></i> File Manager</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9 col-md-10 col-sm-offset-3 col-md-offset-2">
                            <?php } else { ?>
                                <div class="">
                                <?php } ?>

