<?php
$title='Хранителни продукти от български произход';
$description = 'Разгледайте нашият списък с продукти от България';
include '_parts/header.php';
include 'db.php';
?>
<div class="container">
    <h1>Хранителни продукти</h1>
    <hr>
    <b style="font-size:17px;">Минималната поръчка е <span class="glyphicon glyphicon-euro"></span>50</b>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed  ">
            <?php
            $categ = '';
            $table = $con->query("SELECT products.*, categories.name as categ FROM products INNER JOIN categories ON categories.id = products.categorie ORDER BY products.categorie, products.id");
            while ($row = $table->fetch_assoc()) {

                if ($row['categ'] != $categ) {
                    echo '<tr class="success"><th colspan="5" class="text-center"><h3>' . $row['categ'] . '</h3></th></tr><tr><td></td><td></td><td class="text-center"><b>бр./грамаж</b></td><td class="text-center"><b>ед. цена</b></td></tr>';
                }
                ?>
                <tr>
                    <td class="bg-success"># <?= substr($row['pid'], 7, 12); ?></td>
                    <td><b><?= $row['name'] ?></b></td>
                    <td class="text-center"><?= $row['quantity'] ?></td>
                    <td class="text-center"><span class="glyphicon glyphicon-euro"></span> <?= $row['price'] ?> </td>
                    <td class="text-center"><button type="button" class="btn btn-default" onClick="currency_ajax_convert(<?= $row['price'] ?>)">Други валути</button></td>
                </tr>
                <?php
                $categ = $row['categ'];
            }
            ?>
        </table>
    </div>
</div>

<?php 
include 'convertor_template.php';
include '_parts/footer.php';
?>