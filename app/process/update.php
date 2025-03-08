<?php

require_once "../config.php";

$todo_id = $_GET['todo-id'];
$todo_status = $_GET['todo-status'];

$sql_update = "UPDATE todolist SET status=!$todo_status WHERE id=$todo_id";

if ($connection->query($sql_update) === FALSE) {
    echo "Error: " . $sql_insert . "<br>" . $connection->error;
}

header("location:../../index.php");