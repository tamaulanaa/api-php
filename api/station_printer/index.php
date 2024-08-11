<?php

require_once('../../Config/config.php');
header('Content-Type: application/json');

$query = "SELECT * FROM station_printer,level WHERE station_printer.id_level = level.id_level";
$sql = mysqli_query($database, $query);

if ($sql) {
    $results = array();
    while ($row = mysqli_fetch_array($sql)) {
        array_push($results, array(
            'id' => $row['id_station_printer'],
            'level' => array(
                'level' => $row['nama_level']
            ),
            'nama_station' => $row['station_printer']
        ));
    }

    echo json_encode(array('results' => array(
        'station_printer' => $results
    )));
}
