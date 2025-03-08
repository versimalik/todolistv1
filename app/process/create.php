<?php

require_once "../config.php";
$todo_text = trim($_POST['todo-text']);

$sql_insert = "INSERT INTO todolist(text, status) VALUES ('$todo_text', false)";

if ($connection->query($sql_insert) === FALSE) {
    echo "Error: " . $sql_insert . "<br>" . $connection->error;
}

header("location:../../index.php");