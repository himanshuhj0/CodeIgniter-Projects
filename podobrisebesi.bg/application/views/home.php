<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="center-bg">
    <div class="container">
        <h1 class="home-other">Други занимания</h1>
        <div class="row">
            <?php
            $i = 1;
            foreach ($articles_bottom as $article) {
                ?>
                <div class="col-sm-4">
                    <div class="home-boxes <?php
                    if ($i == 1)
                        echo 'pull-left';
                    elseif ($i == 3)
                        echo 'pull-right';
                    ?>">
                        <img alt="<?= $article['title'] ?>" src="<?= base_url('assets/img') . '/' . $article['image'] ?>">
                        <h2><?= $article['title'] ?></h2>
                        <div><?= $article['basic_description'] ?></div>
                        <a href="<?= base_url($article['url']) ?>#view_article" class="home-box-btn">Виж повече</a>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>
</div>

