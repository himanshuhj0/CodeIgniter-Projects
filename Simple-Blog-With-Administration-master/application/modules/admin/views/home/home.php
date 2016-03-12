<div class="row">
    <div class="col-sm-6">
        <h1>Welcome <b><?= $name ?></b></h1>
    </div>
    <div class="col-sm-6">
        <h1>Publish new Post</h1>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-info"><?= validation_errors() ?></div>
        <?php }
        ?>
        <?= form_open('admin/setPost') ?>
        <input type="hidden" name="user" value="<?= $username ?>">
        <div class="form-group">
            <label>Title:</label>
            <input type="text" class="form-control" value="<?= set_value('title') ?>" name="title">
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea class="form-control" name="description" rows="5"><?= set_value('description') ?></textarea>
        </div>
        <div class="form-group">
            <label>Tags (division by comma):</label>
            <input type="text" name="tags" data-role="tagsinput">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-md">Post</button>
        </div>
        <?= form_close() ?>
    </div>
</div>