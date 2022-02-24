<?php

$conn = mysqli_connect("localhost", "mohammed", "", "graduate_yasmin", 3309);



function insert($conn, $table, $data)
{
    $columns = "";
    $valuesData = "";
    foreach ($data as $key => $value) {
        $columns .= "$key" . ",";
        $valuesData .= "'$value'" . ",";
    }
    $columns = rtrim($columns, ",");
    $valuesData = rtrim($valuesData, ",");

    $query = "INSERT INTO $table($columns) VALUES ($valuesData)";
    return mysqli_query($conn, $query);
}

// select * from table ''
function select($conn, $table, $columns)
{
    $query = "SELECT $columns FROM $table";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function delete($conn, $table, $id)
{
    $query = "DELETE FROM $table WHERE id=$id";
    return mysqli_query($conn, $query);
}
