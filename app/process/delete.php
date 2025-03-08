<?php

require_once "../config.php";
$todo_id = $_GET['todo-id'];

$sql_delete= "DELETE FROM todolist WHERE id=$todo_id";

if ($connection->query($sql_delete) === FALSE) {
    echo "Error: " . $sql_insert . "<br>" . $connection->error;
}

header("location:../../index.php");