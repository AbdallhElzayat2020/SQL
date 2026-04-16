<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && !empty($_POST['title'])) {

    $conn = mysqli_connect("localhost", 'root', '', 'sql_db_advanced');

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $description = trim(htmlspecialchars(htmlentities($_POST['description'])));


//    echo $title;

    $sql = "INSERT INTO `tasks` (title, description) VALUES ('$title', '$description')";

}