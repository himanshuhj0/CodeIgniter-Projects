<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="legal-articles">
    <div class="container">
        <h1>Recent Law Articles</h1>
        <?php foreach ($articles as $article) { ?>
            <div class="article">
                <div class="pull-left">
                    <div class="time-published text-center">
                        <span class="day"><?= date('d', $article['time']) ?></span>
                        <span class="mounth"><?= date('m', $article['time']) ?></span>
                        <span class="year"><?= date('Y', $article['time']) ?></span>
                    </div>
                </div>
                <div class="pull-left info">
                    <h1><a href="<?= $article['url'] ?>"><?= $article['title'] ?></a></h1>
                    <div class="description"><?= $article['description'] ?></div>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php } ?>
    </div>
</div>