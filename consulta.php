<?php

include './Banco.php';

$conn = getConexao();

$sql = "SELECT trips.service_id, trips.route_id, stop_times.departure_time, stops.stop_name from stop_times join trips on trips.trip_id = stop_times.trip_id join stops on stops.stop_id = stop_times.stop_id 
where trips.route_id = 'T1'
and stop_times.arrival_time is NOT null  and stop_times.arrival_time != ''
and stop_times.departure_time is not null and stop_times.departure_time != ''
and stop_times.stop_sequence='1'
and trips.direction_id = 0
order by trips.service_id, stop_times.departure_time"

$stmt = $conn->prepare($sql);
$stmt->bindValue($stmt, $sql);
$stmt->execute();

$result = $stmt->fetchAll();
foreach ($result as $value) {

}