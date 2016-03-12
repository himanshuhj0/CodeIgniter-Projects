<h1><?= $book[0]['title'] ?></h1>
<p>Автор: <b><?= $book[0]['author'] ?></b></p>
<p>Година: <b><?= date('Y', $book[0]['year']) ?></b></p>
<p>Количество: <b><?= $book[0]['available'] ?></b></p>
<p>Количество остатък: <b><?= $book[0]['available_now'] ?></b></p>
<p>Жанър: <b><?= $book[0]['genre'] ?></b></p>

<h2>Взета от:</h2>
<div class="table-responsive books">
    <table class="table table-bordered">
        <tr>
            <th>Име</th>
            <th>Фамилия</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Адрес</th>
        </tr>
        <?php if ($book[0]['name'] == null) { ?>
            <tr>
                <td colspan="6">Няма потребители взели тази книга</td>
            </tr>
            <?php
        } else {
            foreach ($book as $ar => $b) {
                ?>
                <tr>
                    <td><a href="<?= base_url('users/used_books/' . $b['id']) ?>"><?= $b['name'] ?></a></td>
                    <td><?= $b['family'] ?></td>
                    <td><?= $b['phone_number'] ?></td>
                    <td><?= $b['email'] ?></td>
                    <td><?= $b['address'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<a href="<?= base_url('books') ?>" class="btn btn-default">Назад</a>