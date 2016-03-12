<div class="row">
    <div class="col-sm-8">
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    Categories
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?= base_url() ?>">Show ALL</a></li>
                    <li class="divider"></li>
                    <?php foreach ($categories as $cat) { ?>
                        <li><a href="?category=<?= $cat['name'] ?>"><?= $cat['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    Time
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li><a href="?orderby=asc">There is no time</a></li>
                    <li><a href="?orderby=desc">There is time</a></li>
                </ul>
            </div>
        </div>
        <ul class="list-inline countr">
            <?php foreach ($countries as $cat) { ?>
                <li> <a href="?country=<?= $cat['code'] ?>"><img src="<?= base_url('assets/imgs/langs/' . $cat['code'] . '.jpg') ?>" alt=" <?= $cat['name'] ?>"></a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="col-sm-4">
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon1">@</span>
            <input type="text" class="form-control" id="subscribe" title="Subscribe to ThePrizeWin.com not miss the coolest prizes!" placeholder="Subscribe to ThePrizeWin.com not miss the coolest prizes!">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="GoSubscribe">Go!</button>
            </span>
        </div>
    </div>
</div>
<div class="clear"></div>
<hr>
<div id="ajax">
    <?php
    foreach ($records as $value) {
        $url_title = url_title($value['title']);
        $url_title = base_url() . $value['id'] . '-' . $url_title;
        ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a href="<?= $url_title ?>"><img src="<?= base_url() ?>attachments/images/<?= $value['image'] ?>" alt="<?= htmlspecialchars($value['title']) ?>"></a>
                <div class="caption">
                    <h3><a href="<?= $url_title ?>"><?= $value['title'] ?></a></h3>
                    <p><a rel="nofollow" target="_blank" href="http://www.facebook.com/share.php?u=<?= $url_title ?>" class="btn btn-primary" role="button">Share</a>
                        <a href="<?= $url_title ?>" title="<?= htmlspecialchars($value['title']) ?>" class="btn btn-default" role="button">SeeMore</a>
                        <img src="<?= base_url() ?>assets/imgs/langs/<?= $value['country'] ?>.jpg"></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>