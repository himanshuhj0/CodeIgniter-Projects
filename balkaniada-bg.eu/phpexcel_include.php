  <?php
    include 'db.php';
  include 'phpExcel/PHPExcel.php';
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objReader->setReadDataOnly(true);

            $objPHPExcel = $objReader->load("products.xlsx");
            $objWorksheet = $objPHPExcel->getActiveSheet();

            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();

            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

            for ($row = 1; $row <= $highestRow; $row++) {
                ?>
                <tr>
                    <?php
                    $c = 1;
                    unset($arr);
                    $arr = array();
                    for ($col = 0; $col <= $highestColumnIndex - 1; $col++) {
                        $col_value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                        if ($col_value == null)
                            $c++;
                        $arr[] = $col_value;
                    }

                    if ($c == 3) {
                       $con->query("INSERT INTO categories_new_proposals (name) VALUES ('$arr[0]')");
                        $last_id = $con->insert_id;
                        echo $last_id;
                    } elseif ($c == 1) {
                    $max = $con->query("SELECT MAX(pid) FROM (SELECT pid FROM products UNION ALL SELECT pid FROM products_new_proposals) a");
		$maxid = $max->fetch_row();
		$pid = (int) $maxid[0] + 1;
                       $con->query("INSERT INTO products_new_proposals (name, pid, quantity, price, categorie) VALUES ('$arr[0]', '$pid', '$arr[1]', '$arr[2]', $last_id)");
                    }
                    ?>
                </tr>
                <?php
            }
            ?>