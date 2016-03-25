<?php

include '../db.php';

if (isset($_POST['name']) && isset($_POST['id'])) {
    $name = addslashes($_POST['name']);
    $name = mb_ereg_replace('\"', "'", $name);
    $id = $_POST['id'];
    $con->query("UPDATE products_new_proposals SET name='$name' WHERE id = $id");
} elseif (isset($_POST['quantity']) && isset($_POST['id'])) {
    $quantity = addslashes($_POST['quantity']);
    $id = $_POST['id'];
    $con->query("UPDATE products_new_proposals SET quantity='$quantity' WHERE id = $id");
} elseif (isset($_POST['price']) && isset($_POST['id'])) {
    $price = addslashes($_POST['price']);
    $id = $_POST['id'];
    $con->query("UPDATE products_new_proposals SET price='$price' WHERE id = $id");
} elseif (isset($_POST['categ']) && isset($_POST['id'])) {
    $categ = addslashes($_POST['categ']);
    $id = $_POST['id'];
    $con->query("UPDATE categories_new_proposals SET name='$categ' WHERE id = $id");
}
?>