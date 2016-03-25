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
                <div id="top-bg">
                    <div class="container">
                        <div class="pull-right head-contact">
                            <div><strong>Тел. 0899679999</strong></div>
                            <a class="pull-right" href="mailto:podobrisebesi@abv.bg">podobrisebesi@abv.bg</a>
                        </div>
                        <div class="clearfix"></div>
                        <span class="helpyourself"><i>Направи добро за тялото си, за да остане душата в него!</i></span>
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand visible-xs" href="#">Подобри себе си</a>
                                </div>
                                <div id="navbar" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        <li <?= uri_string() == '' ? ' class="active"' : '' ?>><a href="<?= base_url() ?>">Начало</a></li>
                                        <li <?= urldecode(uri_string()) == 'Събития_16' ? ' class="active"' : '' ?>><a href="<?= base_url('Събития_16#view_article') ?>">Събития</a></li>
                                        <li <?= urldecode(uri_string()) == 'Тийм_Билдинг_17' ? ' class="active"' : '' ?>><a href="<?= base_url('Тийм_Билдинг_програми_18#view_article') ?>">Тийм Билдинг</a></li>
                                        <li <?= urldecode(uri_string()) == 'контакти' ? ' class="active"' : '' ?>><a href="<?= base_url('контакти#contacts') ?>">Контакти</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div id="slider">
                            <div class="slide" id="slide-1" style=" background-image:url('<?= base_url('assets/img/slider/slide-1.jpg') ?>')">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-6"  id="bg-xs-slider">
                                        <div class="firm-logo pull-right">
                                            <img alt="Actavis" src="<?= base_url('assets/img/firm_logos/actavis.png') ?>">
                                            <img alt="Bede Gaming" src="<?= base_url('assets/img/firm_logos/bede-gaming.png') ?>">
                                            <img alt="Hp" src="<?= base_url('assets/img/firm_logos/hp.png') ?>">
                                            <img alt="Telenor" src="<?= base_url('assets/img/firm_logos/telenor.png') ?>">
                                        </div>
                                        <div class="clearfix visible-xs"></div>
                                        <div class="info">
                                            <h1><?= $slider_info[0]['title'] ?></h1>
                                            <div>
                                                <?= $slider_info[0]['basic_description'] ?>
                                            </div>
                                            <a class="btn btn-primary" href="<?= base_url($slider_info[0]['url'] . '#view_article') ?>">Виж повече</a>
                                        </div>
                                </div>
                            </div>
                            <div id="slide-nav">
                                <div class="slide-change active" data-slide="slide-1"></div>
                            </div>
                            <img class="right-side-glass hidden-xs" src="<?= base_url('assets/img/right-side-glass.png') ?>">
                            <img class="left_side_glass hidden-xs" src="<?= base_url('assets/img/left-side-glass.png') ?>">
                        </div>
                        <div class="head-description">
                            <h1><?= $header_info[0]['title'] ?></h1>
                            <div><?= $header_info[0]['basic_description'] ?></div>
                            <a href="<?= base_url($header_info[0]['url'] . '#view_article') ?>" class="see-more">Прочети повече</a>
                        </div>
                    </div>
                </div>