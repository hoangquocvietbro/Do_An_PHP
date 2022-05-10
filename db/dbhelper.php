<?php
require_once("config.php");

funtion execute($sql){

    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    mysqli_query($con,$sql);
    mysqli_close($con);
}

function executeResult($sql){
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    $result = mysqli_query($con,$sql);
    $data = [];
    while ($row = mysqli_fetch_array($result,1)){
        $data[]= $row;
    }
    return $data;
}
