<?php

require_once('../../Config/config.php');
header('Content-Type: application/json');

$query = "SELECT * FROM meja";
$sql = mysqli_query($database, $query);

if ($sql) {
    $results = array();
    while ($row = mysqli_fetch_array($sql)) {
        array_push($results, array(
            'id' => $row['id_meja'],
            'nama' => $row['nama_meja']
        ));
    }

    echo json_encode(array('results' => array(
        'meja' => $results
    )));
}
