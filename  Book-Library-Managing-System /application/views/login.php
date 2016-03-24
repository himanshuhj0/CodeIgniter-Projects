<div class="col-sm-6 col-sm-offset-3">
    <?php if (validation_errors()) { ?>
        <hr>    <div class="alert alert-danger" role="alert"><?= validation_errors() ?></div> 
    <?php } ?>
    <?php if ($this->session->flashdata('message') != null) { ?>
        <hr> <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('message') ?></div>
    <?php } ?>
    <hr> 
    <form method="POST" role="form">
        <div class="form-group">
            <label for="username">Потребител:</label>
            <input type="username" name="username" maxlength="10" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="pwd">Парола:</label>
            <input type="password" name="password" class="form-control" id="pwd">
        </div>
        <button type="submit" class="btn btn-default">Вход</button>
    </form>
    <hr> 
</div>