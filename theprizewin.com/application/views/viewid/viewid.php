<?php
    $url_title = url_title($value['title']);
    $url_title = base_url() . $value['id'] . '-' . $url_title;
    $date = date('d.F.Y', $value['timestamp']);
    ?>
    <div class="viewcontent">
        <a href="<?= base_url() ?>" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span> Back to prizes</a>
        <h1><?= $value['title'] ?></h1>
        <div class="col-lg-12 left-col">
            <img class="marg-bottm" src="<?= base_url('attachments/images/' . $value['image']) ?>" alt="<?= htmlspecialchars($value['title']) ?>">
            <div class="alert alert-info marg-bottm" role="alert"><b>Valid untill: </b><?= $date ?></div>
            <div class="marg-bottm"><b>Country: </b><img src="<?= base_url('assets/imgs/langs/' . $value['country'] . '.jpg') ?>" class="country"></div>
            <div class="marg-bottm"><b>Category: </b><?= $value['category'] ?></div>
            <div class="marg-bottm"><b>Description: </b><br><?= $value['description'] ?></div>
            <div class="marg-bottm"><b class="red">Participate:</b><br>
                <div class="btn-group">
                    <a href="<?= $value['address'] ?>" target="_blank" rel="nofollow" class="btn btn-info"  aria-expanded="false">
                        Go See Offer
                    </a>
                </div>
            </div>
            <hr>
            <iframe src="//www.facebook.com/plugins/share_button.php?href=<?= $url_title ?>&amp;layout=box_count" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            <script src="https://apis.google.com/js/platform.js" async defer>
                {
                    lang: 'en'
                }
            </script>
            <div class="g-plusone" data-annotation="inline" data-width="300"></div>
            <hr>
        </div>
    </div>
