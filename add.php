<?php
session_start();
if (!isset($_SESSION["Id"])) {
    header("Location: index.php");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Welcome to Ramo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assests/css/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>
    <body>

        <form action="addincidence.php" method="post">
            <h2>Add New Incidence:</h2>
            <br>
            <div class="elem-group">
                <label for="details">Details:</label>
                <textarea id="details" name="details" required></textarea>
            </div>
                        <hr>
            <div class="elem-group">
                <label for="priority-selection">Priority:</label>
                <select id="priority-selection" name="priority-selection" required>
                    <option value="">Choose priority from the List</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>
                                    <hr>
            <div class="elem-group">
                <label for="status-selection">Status:</label>
                <select id="status-selection" name="status-selection" required>
                    <option value="">Choose status from the List</option>
                    <option value="Open">Open</option>
                    <option value="In progress">In Progress</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>


            <button type="submit">Add Incidence</button>
        </form>

    </body>
</html>