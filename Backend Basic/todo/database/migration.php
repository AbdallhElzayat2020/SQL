<?php

// connecting to database
$conn = mysqli_connect("localhost", 'root', '', 'sql_db_advanced');

// check if the connection is successful
if (!$conn) {
    echo "Connect error to your database " . mysqli_connect_error($conn);
}

//$sql = "CREATE DATABASE if not exists sql_db_advanced";
//$sql = "DROP DATABASE sql_db_advanced";
$sql = "CREATE TABLE IF NOT EXISTS tasks (
      `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(255) not null,
    `description` text not null
)";

mysqli_query($conn, $sql);
//mysqli_close($conn);


echo mysqli_error($conn);


echo "<pre>";
var_dump($conn);
