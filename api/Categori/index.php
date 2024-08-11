<?php

require_once('../../Config/config.php');
header('Content-Type: application/json');

$query = "SELECT * FROM categori";
$sql = mysqli_query($database, $query);

if ($sql) {
    $results = array();
    while ($row = mysqli_fetch_array($sql)) {
        array_push($results, array(
            'id' => $row['id'],
            'nama' => $row['nama_categori']
        ));
    }

    print_r(json_encode(array('results' => array(
        'categori' => $results
    ))));
}
