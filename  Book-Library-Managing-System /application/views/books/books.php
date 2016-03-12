<?php if ($this->session->flashdata('message') != null) { ?>
    <div class="alert alert-info" role="alert"><?= $this->session->flashdata('message') ?></div>
<?php } ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <a href="<?= base_url('books/add_edit_book') ?>" class="btn btn-primary">Добави книга</a>
        </div>
    </div>
    <div class="col-sm-6">  
        <form method="get" action="books">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="findbook" placeholder="Търси по име на книгата, жанр или автор..." value="<?= $this->input->get('findbook') ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Търси</button>
                        <a href="<?= base_url('books') ?>" class="btn btn-default">Изчисти</a>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive books">
    <table class="table table-bordered">
        <tr>
            <th>Име</th>
            <th>Автор</th>
            <th>Година на издаване</th>
            <th>Жанр</th>
            <th>Количество</th>
            <th>Количество остатък</th>
            <th>Корица</th>
            <th>Инфо</th>
            <th>Редакция</th>
            <th>Изтриване</th>
        </tr>
        <?php foreach ($books as $book) { ?>
            <tr>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= date('Y', $book['year']) ?></td>
                <td><?= $book['genre'] ?></td>
                <td><?= $book['available'] ?></td>
                <td><?= $book['available_now'] ?></td>
                <td><img class="img-responsive image" src="<?= base_url('assets/uploads_covers/' . $book['cover']) ?>"></td>
                <td><a href="<?= base_url('books/view_book/' . $book['id']) ?>"class="btn btn-default">Преглед <span class="glyphicon glyphicon-zoom-in"></span></a></td>
                <td><a href="<?= base_url('books/add_edit_book/' . $book['id']) ?>" class="btn btn-default">Редактирай</a></td>
                <td><a href="<?= base_url('books/delete/' . $book['id']) ?>" class="btn btn-danger" onclick="return confirm('Наистина ли искате да изтриете тази книга?')">Изтрии</a></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php if (!empty($links_pagination)) { ?>
    <div class="row text-center">
        <div class="col-lg-12">
            <?= $links_pagination ?>
        </div>
    </div>
<?php } ?>