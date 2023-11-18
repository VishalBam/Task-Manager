<?php
include('config.php');

function getTasks() {
    global $conn;
    $result = $conn->query("SELECT * FROM tasks");
    $tasks = [];

    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    return $tasks;
}

function addTask($title, $description) {
    global $conn;
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);

    $conn->query("INSERT INTO tasks (title, description) VALUES ('$title', '$description')");
}

function updateTask($id, $title, $description) {
    global $conn;
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);

    $conn->query("UPDATE tasks SET title='$title', description='$description' WHERE id=$id");
}

function deleteTask($id) {
    global $conn;
    $conn->query("DELETE FROM tasks WHERE id=$id");
}
