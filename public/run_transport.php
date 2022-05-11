<?php

if (empty($_GET['t'])) {
    die('exit');
}
$table = $_GET['t'];

$connect = mysqli_connect('localhost','metodistam_old', 'metodistam_old', 'metodistam_old');

if ($table === 'training_centers') {
    $sql = "SELECT * FROM `training_centers`;";
    $query = mysqli_query($connect, $sql);

    $field = [];
    while ($row = mysqli_fetch_field($query)) {
        $field[] = $row->name;
    }
    $out=[];
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $out[] = $row;
    }

    echo json_encode($out);
}

if($table === 'training_centers_item') {
    $sql = "SELECT * FROM `training_center_organizations`;";
    $query = mysqli_query($connect, $sql);

    $field = [];
    while ($row = mysqli_fetch_field($query)) {
        $field[] = $row->name;
    }
    $out=[];
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $out[] = $row;
    }

    echo json_encode($out);
}
