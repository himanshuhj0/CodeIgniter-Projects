<?php if ($this->session->flashdata('result')) { ?>
    <div class="alert alert-info"><?= $this->session->flashdata('result') ?></div>
<?php }
?>  
<?php foreach ($result as $val) { ?>
    <?= form_open('admin/setPost' . '/' . $val['id']) ?>
    <input type="hidden" value="<?= $val['id'] ?>" name="id">
    <div class="form-group">
        <label>Title:</label>
        <input type="text" class="form-control" value="<?= $val['title']; ?>" name="title" aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control" name="description" rows="5"><?= $val['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Tags (division by comma):</label>
        <input type="text" name="tags" data-role="tagsinput" value="<?= $val['tags']; ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-md">Update</button>
        <a href="<?= base_url('admin/allPosts') ?>" class="btn btn-primary btn-md">Cancel</a>
    </div>
    <?= form_close() ?>
<?php } ?>
<?php if (!empty($comments)) { ?>
    <hr>
    <h2>Comments:</h2>
<?php } ?>
<?php foreach ($comments as $comm) { ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?= $comm['name'] ?>
                <small><?= $comm['date'] ?></small>
            </h4>
            <?= $comm['description'] ?>
        </div>
    </div>
    <a href="<?= base_url('admin/delete_comment') . '/' . $comm['id'] . '/' . $val['id'] ?>"><span class="glyphicon glyphicon-remove"></span> Delete it !</a>
    <?php
}
?>
<hr>