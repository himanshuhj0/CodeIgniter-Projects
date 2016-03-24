<div class="row">
    <div class="col-sm-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Книги със <span class="text-danger">закъснял срок</span></th>
                </tr>
                <?php foreach ($books_late as $book_late) { ?>
                    <tr>
                        <td>
                            <h4><b>Книга:</b> <?= $book_late['title'] ?></h4>
                            <p><b>Дата на вземане:</b> <?= date('d-m-Y', $book_late['date_give']) ?></p>
                            <p><b>Дата за връщане:</b> <?= date('d-m-Y', $book_late['date_for_back']) ?></p>
                            <p><b>Автор:</b> <?= $book_late['author'] ?></p>
                            <p><b>Дадена на:</b> <?= $book_late['name'] ?></p>
                            (<?= $book_late['available_now'] ?>/<?= $book_late['available'] ?>)
                        </td>   
                    </tr>

                <?php } ?>
            </table>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Книги в срок</th>
                </tr>
                <?php foreach ($books_not_late as $book_no_late) { ?>
                    <tr>
                        <td>
                            <h4><b>Книга:</b> <?= $book_no_late['title'] ?></h4>
                            <p><b>Дата на вземане:</b> <?= date('d-m-Y', $book_no_late['date_give']) ?></p>
                            <p><b>Дата за връщане:</b> <?= date('d-m-Y', $book_no_late['date_for_back']) ?></p>
                            <p><b>Автор:</b> <?= $book_no_late['author'] ?></p>
                            <p><b>Дадена на:</b> <?= $book_no_late['name'] ?></p>
                            (<?= $book_no_late['available_now'] ?>/<?= $book_no_late['available'] ?>)
                        </td>   
                    </tr>

                <?php } ?>
            </table>
        </div>
    </div>
</div>