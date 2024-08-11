<?php
require_once('../../Config/config.php');
header('Content-Type: application/json');

$categori = $_POST['categori'];

$query = "INSERT INTO categori(nama_categori) VALUES('$categori') ";
$sql = mysqli_query($database, $query);

if ($sql) {
    echo json_encode(array(
        'results' => array(
            'message' => "berhasil Ditambah",
            'data' => array(
                'categori' => $categori
            )
        )
    ));
} else {
    echo json_encode(array(
        'results' => array(
            'message' => "failed"
        )
    ));
}
