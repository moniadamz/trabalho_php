<?php
error_reporting(E_ALL);
ini_set('MAX_EXECUTION_TIME', '-1');
ini_set('memory_limit', '-1');

/* Database connections */
$_host = 'localhost';
$_name = 'root';
$_password = '';
$_database = 'projeto';


/* =========== PDO ================= */
try {
$link = new PDO('mysql:dbname=' . $_database . ';host=' . $_host . ';charset=utf8', $_name, $_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $link->exec("set names utf8");
} catch (PDOException $ex) {
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//load_and_insert('calendar', 'gtfs\calendar.csv');
//load_and_insert('calendar_dates', 'gtfs\calendar_dates.csv');
//load_and_insert('routes', 'gtfs\routes.csv');
//load_and_insert('stop_times', 'gtfs\stop_times.csv');
//load_and_insert('stops', 'gtfs\stops.csv');
load_and_insert('trips', 'gtfs\trips.csv');

function load_and_insert($table, $file) {
/* ========= Load file content in an array ========== */
$rows = array_map('str_getcsv', file($file));
$header = array_shift($rows);
$csv = array();
foreach ($rows as $row) {
    $csv[] = array_combine($header, $row);
}

/* ========= Insert Script ========== */
foreach ($csv as $i => $row) {
    insert($row, $table);
}
}

function insert($row, $table) {
    global $link;
    $sqlStr = "INSERT INTO $table SET ";
    $data = array();
    foreach ($row as $key => $value) {
        $sqlStr .= $key . ' = :' . $key . ', ';
        $data[':' . $key] = $value;
    }
    $sql = rtrim($sqlStr, ', ');
    $query = $link->prepare($sql);
    $query->execute($data);
}

echo "Done inserting data in table";
?>