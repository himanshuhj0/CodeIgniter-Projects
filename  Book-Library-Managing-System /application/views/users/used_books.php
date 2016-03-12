<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php if ($this->session->flashdata('message') != null) { ?>
    <div class="alert alert-info" role="alert"><?= $this->session->flashdata('message') ?></div>
<?php } ?>
<h1>Списък с книги взети от <i><b><?= $books[0]['name'] . ' ' . $books[0]['family'] ?></b></i></h1>
<form role="form" method="post">
    <input type="hidden" value="<?= $books[0]['user_id'] ?>" name="user_id">
    <div class="form-group">
        <label>Добави книга към списъка:</label>
        <div class="input-group">
            <input type="text" class="form-control" id="value_book_name" placeholder="Име на книгата">
            <input type="text" class="form-control" id="value_date_time" placeholder="Дата за връщане">
            <span class="input-group-btn">
                <button class="btn btn-default" id="add_recipient" type="button"><span class="glyphicon glyphicon-plus"></span></button>
            </span>
        </div> 
    </div>
    <ul class="list-group" id="recipient_list">
        <?php foreach ($books as $book) { ?>
            <li class="list-group-item">
                <a href="<?= base_url('books/view_book/' . $book['id']) ?>"><?= $book['title'] ?></a>
                <a href="#" class="glyphicon glyphicon-remove book_delete"></a>
            </li>
        <?php } ?>
    </ul>
    <div class="hidden" id="deleted_list"></div>
    <button type="submit" class="btn btn-primary">Запиши</button>
    <a href="<?= base_url('users') ?>" class="btn btn-default">Назад</a>
</form>
<script>
    $(document).ready(function () {
        $("#add_recipient").click(function () {
            var val = $("#value_book_name").val();
            var val_date = $("#value_date_time").val();
            if (val == false || val_date == false) {
                return false;
            }
            if ($("input[value='" + val + "-todate-" + val_date + "']").length == 0) {
                $("#recipient_list").append($('<li class="list-group-item"></li>').
                        html(val + '<a href="#" class="glyphicon glyphicon-remove book_delete"></a>'
                                + '<input type="hidden" value="' + val + '-todate-' + val_date + '" name="added_books[]">'));
            } else {
                alert('Книгата вече е добавена в списъка!');
            }

        });
        $("body").on("click", ".book_delete", function () {
            var title = $(this).parent().text().trim();
            $("#deleted_list").append('<input type="hidden" value="' + title + '" name="deleted_books[]">');
            $(this).parent().remove();
            return false;
        });
    });
    $("#value_book_name").autocomplete({
        source: "<?= base_url('books/autocompleteReturn') ?>"
    });

    $(function () {
        $('#value_date_time').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'dd.mm.yy',
            onClose: function (dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        });
    });
</script>