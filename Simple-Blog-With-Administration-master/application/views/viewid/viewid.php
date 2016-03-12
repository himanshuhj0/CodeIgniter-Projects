<a href="<?= base_url() ?>" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span> Back to Posts</a>
<?php foreach ($result as $val) { ?>
    <h1><?= html_escape($val['title']) ?></h1>
    <p class="lead">
        by <?= $val['user'] ?>
    </p>
    <hr>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $val['date'] ?></p>
    <hr>
    <?= $this->typography->auto_typography(html_escape($val['description'])) ?>
    <hr>
    <div class="well">
        <?php if (validation_errors()) { ?>
            <div class="alert alert-info"><?= validation_errors() ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('comment')) { ?>
            <div class="alert alert-info"><?= $this->session->flashdata('comment') ?></div>
        <?php }
        ?>  
        <?= form_open() ?>
        <div class="form-group">
            <div><label>Your Name:</label></div>
            <input type="text" class="form-control comm-name" maxlength="50" value="<?= set_value('name') ?>" name="name">
        </div>
        <h4>Leave a Comment:</h4>
        <div class="form-group">
            <textarea class="form-control" name="description" rows="3" maxlength="1200" placeholder="Max Charters - 1200!"><?= set_value('description') ?></textarea>
        </div>
        <input type="hidden" name="for_id" value="<?= $val['id'] ?>">
        <button type="submit" class="btn btn-primary">Put it..</button>
        <?= form_close() ?>
    </div>
    <hr>
    <?php foreach ($comments as $comm) { ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?= html_escape($comm['name']) ?>
                    <small><?= $comm['date'] ?></small>
                </h4>
                <?= html_escape($comm['description'])?>
            </div>
        </div>
        <?php
    }
}
?>
