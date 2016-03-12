<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="row">
    <div class="col-sm-6"> 
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert"><?= validation_errors() ?></div> 
        <?php } ?>
        <?php if ($this->session->flashdata('message') != null) { ?>
            <div class="alert alert-info" role="alert"><?= $this->session->flashdata('message') ?></div>
        <?php } ?>
        <h1>Добавяне/Редактиране на книга</h1>
        <?= form_open_multipart('books/add_edit_book/' . @$_POST['id']); ?>
        <div class="form-group">
            <label for="username">Име:</label>
            <input type="text" name="title" value="<?= @$_POST['title'] ?>" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="name">Автор:</label>
            <input type="text" name="author" value="<?= @$_POST['author'] ?>" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="family">Година на издаване:</label>
            <input type="text" name="year" value="<?= @$_POST['year'] ?>" class="form-control" id="date" data-date-format="dd.mm.yyyy">
        </div>
        <div class="form-group">
            <label for="phone_number">Жанр:</label>
            <input type="text" name="genre" value="<?= @$_POST['genre'] ?>" class="form-control" id="phone_number">
        </div>
        <div class="form-group">
            <label for="email">Количество:</label>
            <input type="text" name="available" value="<?= @$_POST['available'] ?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <?php if (!empty($_POST['cover'])) { ?>
                <label>Сегашна картинка:</label>
                <img class="img-responsive" src="<?= base_url('assets/uploads_covers/' . $_POST['cover']) ?>">
                <label>или изберете нова:</label><br>
            <?php } ?>
            <label for="address">Снимка:</label>
            <input type="file" name="userfile" size="20" />
            <span>Max-Width:500px, Max-Height:800px; Max-Size:2048KB (2MB)</span>
        </div>
        <button type="submit" class="btn btn-primary">Добави</button>
        <a href="<?= base_url('books') ?>" class="btn btn-default">Отказ</a>
        <?= form_close() ?>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#date').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            onClose: function (dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        });
        $("#date").focus(function () {
            $(".ui-datepicker-month").hide();
        });
    });

</script>
