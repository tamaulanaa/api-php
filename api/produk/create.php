<?php
require_once('../../Config/config.php');
header('Content-Type: application/json');

$id_categori = $_POST['id_categori'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$query = "INSERT INTO produk(id_categori,nama_produk,harga) VALUES('$id_categori','$nama','$harga') ";
$categori = "SELECT nama_categori FROM categori WHERE id=$id_categori";
$sql = mysqli_query($database, $query);
$sqlcategori = mysqli_query($database, $categori);

if ($sql) {
    $data = array();
    while ($row = mysqli_fetch_array($sqlcategori)) {
        array_push($data, array(
            'categori' => $row['nama_categori'],
            'nama' => $nama,
            'harga' => $harga
        ));
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
