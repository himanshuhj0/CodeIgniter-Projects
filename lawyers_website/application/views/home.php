<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="home">
    <div class="slider">
        <div class="container">
            <div class="slide slide-1" style="background-image: url('<?= base_url('assets/img/slider-home/slide-1.jpg') ?>');">
                <div class="pull-left contents">
                    <h2>Trusted</h2>
                    <h3>source of legal information</h3>
                    <div class="description">Phasellus porta. Fusce susct varius mi. Cum sociis natoque penabus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.</div>
                    <a href="" class="more">More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="resent">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 left-side">
                    <span>Recent<br>
                        Legal Articles</span>
                </div>
                <div class="col-sm-9 right-side">
                    <?php foreach ($recent as $rec_art) { ?>
                        <div class="col-sm-4 resent-box">
                            <h3>
                                <?= $rec_art['title'] ?>
                            </h3>
                            <hr>
                            <div class="description">
                                <?= $rec_art['description'] ?>
                            </div>
                            <a href=" <?= $rec_art['url'] ?>" class="more-gradient">More info</a>
                        </div>                  
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2><?= $home_federal[0]['title'] ?></h2>
                    <div class="content">
                        <?= $home_federal[0]['description'] ?>
                    </div>
                    <a href="<?= $home_federal[0]['url'] ?>" class="more-gradient">More info</a>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-center">Government, Courts and Laws</h2>
                    <div class="home-lists">
                        <ul class="pull-right">
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                        </ul>
                        <ul class="pull-right">
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                            <li><a href=""><i class="fa fa-thumb-tack"></i> Executive Branch</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>