<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
        <title>Welcome to Finance Portal</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assests/css/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 15px;
            }
        </style>

    </head>
    <body>
        <?php
        session_start();
        include 'connect.php';
        $id = $_SESSION["Id"];
        $sql = mysqli_query($conn, "SELECT * FROM ramo_users where id=$id");
        $row = mysqli_fetch_array($sql);
        $incident_sql = mysqli_query($conn, "SELECT * FROM reported_incidence where userid=$id");
        $incident_rows = array();
        $incident_rows = mysqli_fetch_all($incident_sql, MYSQLI_ASSOC);
        ?>
        <div class="signup-form">
            <form action="home.php" method="post">
                <h2><p class="hint-text"><br><b>Welcome: </b><?php echo $_SESSION["First"] ?> <?php echo $_SESSION["Last"] ?></p></h2>
                <br>
                <button onClick="javascript:window.open('add.php', '_blank');">Add Incidence</button>
                <?php if (!empty($incident_rows)) { ?>
                    <br><table>
                        <tr>
                            <th>Incident</th>
                            <th>Details</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Time Created</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach ($incident_rows as $key => $row) { ?>
                            <tr>
                                <td> <?php echo $row['incidentid'] ?> </td>
                                <td> <?php echo $row['details'] ?> </td>
                                <td> <?php echo $row['priority'] ?> </td>
                                <td> <?php echo $row['status'] ?> </td>
                                <td> <?php echo date("d-m-Y H:i:s", $row['timecreated']) ?> </td>
                                <?php if ($row['status'] != 'Closed') { ?>
                                    <td> <a href="update.php?ticketid=<?php echo $row['id'] ?>"><i class="fa fa-edit" style="margin-left: 10px;"></i></a>
                                    <?php } ?>
                                    <a href="delete.php?ticketid=<?php echo $row['id'] ?>"><i class="fa fa-trash-o" style="margin-left: 2px;"></i> </a></td>

                            <?php
                            }
                        } else {
                            echo "<br>No records Found! Please create some incidence";
                        }
                        ?>
                    </tr>
                </table>      


                <div class="text-center"><br><a href="logout.php">Logout</a></div>
            </form>

        </div>
    </body>
</html>