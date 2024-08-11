<?php
require_once('../../Config/config.php');
header('Content-Type: application/json');

$id_produk = $_POST['id_produk'];
$id_station_printer = $_POST['id_station_printer'];
$id_meja = $_POST['id_meja'];
$qty = $_POST['qty'];

$queryproduk = "SELECT * FROM produk WHERE id_produk = $id_produk";
$sqlproduk = mysqli_query($database, $queryproduk);
$data_produk = mysqli_fetch_array($sqlproduk);

$querymeja = "SELECT * FROM meja WHERE id_meja = $id_meja";
$sqlmeja = mysqli_query($database, $querymeja);

$queryprinter = "SELECT * FROM station_printer WHERE id_station_printer = $id_station_printer";
$sqlprinter = mysqli_query($database, $queryprinter);
$printer = mysqli_fetch_array($sqlprinter);

$total_harga = $data_produk['harga'] * $qty;

$query = "INSERT INTO transaksi(id_produk,id_station_printer,id_meja,qty,total_harga) VALUES('$id_produk','$id_station_printer','$id_meja','$qty','$total_harga') ";
$sql = mysqli_query($database, $query);


if ($sql) {
    if ($data_produk['id_categori'] == 1) {
        # code...
        $data = array();
        while ($row = mysqli_fetch_array($sqlmeja)) {
            array_push($data, array(
                'produk' => array(
                    'nama_prooduk' => $data_produk['nama_produk'],
                    'harga' => $data_produk['harga']
                ),
                'Meja' => $row['nama_meja'],
                'station_printer' => array(
                    'pelayan' => $printer['station_printer'],
                    'petugas' => "station dapur"
                ),
                'total_harga' => $total_harga
            ));
        }
    } elseif ($data_produk['id_categori'] == 2) {
        # code...
        $data = array();
        while ($row = mysqli_fetch_array($sqlmeja)) {
            array_push($data, array(
                'produk' => array(
                    'nama_prooduk' => $data_produk['nama_produk'],
                    'harga' => $data_produk['harga']
                ),
                'Meja' => $row['nama_meja'],
                'station_printer' => array(
                    'pelayan' => $printer['station_printer'],
                    'petugas' => "station bar"
                ),
                'total_harga' => $total_harga
            ));
        }
    } else {
        # code...
        $data = array();
        while ($row = mysqli_fetch_array($sqlmeja)) {
            array_push($data, array(
                'produk' => array(
                    'nama_prooduk' => $data_produk['nama_produk'],
                    'harga' => $data_produk['harga']
                ),
                'Meja' => $row['nama_meja'],
                'station_printer' => array(
                    'pelayan' => $printer['station_printer'],
                    'petugas' => "station dapur dan station bar"
                ),
                'total_harga' => $total_harga
            ));
        }
    }
    echo json_encode(array(
        'results' => array(
            'message' => "berhasil Ditambah",
            'data' => $data
        )
    ));
} else {
    echo json_encode(array(
        'results' => array(
            'message' => "failed"
        )
    ));
}
