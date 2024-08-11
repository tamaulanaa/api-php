<?php

require_once('../../Config/config.php');
header('Content-Type: application/json');

$id = $_GET['id_transaksi'];

$query = "SELECT id_transaksi, nama_meja, qty,total_harga,nama_produk FROM transaksi JOIN meja ON transaksi.id_meja = meja.id_meja JOIN produk ON transaksi.id_produk = produk.id_produk WHERE id_transaksi = $id";
$sql = mysqli_query($database, $query);

if ($sql) {
    $results = array();
    while ($row = mysqli_fetch_array($sql)) {
        array_push($results, array(
            'id_transaksi' => $row['id_transaksi'],
            'meja' => $row['nama_meja'],
            'qty' => $row['qty'],
            'total_harga' => $row['total_harga']
        ));
    }

    echo json_encode(array('results' => array(
        'produk' => $results
    )));
}
