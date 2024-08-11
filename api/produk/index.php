<?php

require_once('../../Config/config.php');
header('Content-Type: application/json');

$query = "SELECT * FROM produk,categori WHERE produk.id_categori = categori.id";
$sql = mysqli_query($database, $query);

if ($sql) {
    $results = array();
    while ($row = mysqli_fetch_array($sql)) {
        array_push($results, array(
            'id' => $row['id_produk'],
            'categori' => array(
                'id_categori' => $row['id'],
                'nama_categori' => $row['nama_categori']
            ),
            'harga' => $row['harga']
        ));
    }

    echo json_encode(array('results' => array(
        'produk' => $results
    )));
}
