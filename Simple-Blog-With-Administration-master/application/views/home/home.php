<div class="row">
    <div class="col-sm-8">
        <?php foreach ($result as $val) { ?>
            <h1><a href="<?= base_url($val['id'] . '-' . url_title($val['title'])) ?>"><?= html_escape($val['title']) ?></a></h1>
            <p class="lead">
                by <?= $val['user'] ?>
            </p>
            <hr>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $val['date'] ?></p>
            <hr>
            <?= word_limiter(html_escape($val['description']), 100) ?>
            <hr>
        <?php } ?>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Popular Tags</h4>
            </div>
            <div class="panel-body">
                <ul class="list-inline">
                    <?php foreach (explode(',', $tags) as $tag) { ?>
                        <li><a href="?tag=<?= $tag ?>"><?= $tag ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Last Comments</h4>
            </div>
            <div class="panel-body">
                <ul>
                    <?php foreach ($lastcomments as $comm) { ?>
                        <li><b><?= $comm['name'] ?></b> for <a href="<?= base_url($val['id'] . '-' . url_title($val['title'])) ?>"><?= $comm['title'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $links_pagination ?>