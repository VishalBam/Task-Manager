<?php
include('config.php');
include('tasks.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submissions
    if (isset($_POST['addTask'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        addTask($title, $description);
    } elseif (isset($_POST['updateTask'])) {
        $taskId = $_POST['taskId'];
        $updatedTitle = $_POST['updatedTitle'];
        $updatedDescription = $_POST['updatedDescription'];
        updateTask($taskId, $updatedTitle, $updatedDescription);
    }
}

if (isset($_GET['deleteTask'])) {
    // Handle task deletion
    $taskId = $_GET['deleteTask'];
    deleteTask($taskId);
}

$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            overflow: hidden;
        }

        li span {
            display: block;
            margin-bottom: 5px;
        }

        li button, a button {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            float: right;
        }

        li button:hover, a button:hover {
            background-color: #d32f2f;
        }

        #updateForm {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Task Manager</h1>
</header>

<div class="container">
    <form id="taskForm" method="post" action="index.php">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit" name="addTask">Add Task</button>
    </form>
    <div id="updateForm" style="display: none;">
        <h2>Edit Task</h2>
        <form id="editForm" method="post" action="index.php">
            <input type="hidden" id="taskId" name="taskId">
            <label for="updatedTitle">Title:</label>
            <input type="text" id="updatedTitle" name="updatedTitle" required>

            <label for="updatedDescription">Description:</label>
            <textarea id="updatedDescription" name="updatedDescription" required></textarea>

            <button type="submit" name="updateTask">Update Task</button>
        </form>
    </div>

    <ul id="taskList">
        <?php foreach ($tasks as $task) : ?>
            <li id=<?= $task['id']; ?>>
                <span><?= $task['title']; ?></span>
                <span><?= $task['description']; ?></span>
                <a href="index.php?deleteTask=<?= $task['id']; ?>" onclick="return confirm('Are you sure?')">
                    <button>Delete</button>
                </a>
                <button onclick="editTask(<?= $task['id']; ?>)">Edit</button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script>
    function editTask(taskId) {
        document.getElementById('updatedTitle').value = document.getElementById(taskId).getElementsByTagName('span')[0].innerText;
        document.querySelector("#updatedDescription").innerText = document.getElementById(taskId).getElementsByTagName('span')[1].innerText;
        document.getElementById('taskId').value = taskId;
        document.getElementById('taskForm').style.display = 'none';
        document.getElementById('updateForm').style.display = 'block';
        document.getElementById(taskId).style.display = 'none';
    }
</script>

</body>
</html>
