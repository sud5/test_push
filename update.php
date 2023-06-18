<?php
session_start();
include 'connect.php';
if (!isset($_SESSION["Id"])) {
    header("Location: index.php");
}

$id = $_GET["ticketid"];
$sql = mysqli_query($conn, "SELECT * FROM reported_incidence where id=$id");
$row = mysqli_fetch_array($sql);
$userid = $row['userid'];
if ($_SESSION["Id"] != $userid) {
    echo "You don't have permission to update this incidence";
    exit;
} else if ($row['status'] == 'Closed') {
    echo "Seems Ticket is already closed";
} else {
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

            <form action="updateincidence.php?ticketid=<?php echo $id ?>" method="post">
                <h2>Add a Ticket:</h2>
                <br>
                <div class="elem-group">
                    <label for="details">Details</label>
                    <textarea id="details" name="details" required><?php echo $row['details'];?></textarea>
                </div>
                <hr>
                <div class="elem-group">
                    <label for="priority-selection">Priority Of Ticket</label>
                    <select id="priority-selection" name="priority-selection" required>
                        <option value="">Choose priority from the List</option>
                        <option value="High"<?php if($row['priority'] == "High") echo "selected" ?>>High</option>
                        <option value="Medium"<?php if($row['priority'] == "Medium") echo "selected" ?>>Medium</option>
                        <option value="Low"<?php if($row['priority'] == "Low") echo "selected" ?>>Low</option>
                    </select>
                </div>
                <hr>
                <div class="elem-group">
                    <label for="status-selection">Status</label>
                    <select id="status-selection" name="status-selection" required>
                        <option value="">Choose status from the List</option>
                       <option value="Open"<?php if($row['status'] == "Open") echo "selected" ?>>Open</option>
                        <option value="In progress"<?php if($row['status'] == "In progress") echo "selected" ?>>In progress</option>
                        <option value="Closed"<?php if($row['status'] == "Closed") echo "selected" ?>>Closed</option>
                    </select>
                </div>


                <button type="submit">Update Incidence</button>
            </form>

        </body>
    </html>
    <?php
}
?>