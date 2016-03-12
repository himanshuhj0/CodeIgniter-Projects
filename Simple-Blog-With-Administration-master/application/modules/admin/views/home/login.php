<div class="row">
    <div class="col-sm-3">
        <?php if (validation_errors()) { ?>
            <div class="alert alert-info"><?= validation_errors() ?></div>
        <?php }
        ?>
        <?= form_open('admin') ?>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" value="<?= set_value('username') ?>" name="username" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="text" class="form-control" value="<?= set_value('password') ?>" name="password" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-md">Login</button>
        </div>
        <?= form_close() ?>
    </div>
</div>