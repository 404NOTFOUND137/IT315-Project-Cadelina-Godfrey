<?php
    include 'Database_Information.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TO DO TASK LIST</title>
        <style>
            * {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 100%;
                margin: 0px;
                padding: 0px;
            }
            #MainContainer {
                background-color: skyblue;
                border: 1px solid black;
                margin: 20px 20px 20px 20px;
                padding-top: 20px;
                padding-bottom: 45px;
                width: 1300px;
            }
            table {
                width: 1200px;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
                padding: 5px 5px 5px 10px;
                text-align: left;
                background-color: #f2f2f2;
            }
            th {
                background-color: #f2f2f2;
            }
            .row_action {
                width: 130px;
            }
            .row_task {
                width: 850px;
            }
            .Form {
                border-top: 1px solid black;
                border-left: 1px solid black;
                border-right: 1px solid black;
                width: 1188px;
                margin-left: auto;
                margin-right: auto;
                padding-left: 10px;
                padding-top: 10px;
                background-color: #f2f2f2;
            }
            .Label {
                font-size: 120%;
            }
            .Task {
                width: 1173px;
                margin-top: 5px;
                margin-bottom: 10px;
            }
            .Submit {
                font-size: 70%;
                padding: 5px 20px;
                margin-bottom: 10px;
                background-color: skyblue;
                border: 1px solid black;
            }
            .Submit:hover {
                color: red;
            }
            .Update, .Delete {
                text-decoration: none;
                color: blue;
            }
            .Footer {
                margin-left: auto;
                margin-right: auto;
                width: 1200px;
                height: auto;
                background-color: black;
            }
            .Credits {
                color: whitesmoke;
                padding-top: 10px;
                padding-bottom: 10px;
            }
            td {
                word-break: break-word;    
            }
        </style>
    </head>
    <body>
        <div id="MainContainer">
            <div class="Form">
                <form action="add_task.php" method="post">
                    <label for="task" class="Label">Please Enter your Task Below</label><br>
                    <input type="text" name="task" class="Task" required><br>
                    <input type="submit" value="Save" class="Submit">
                </form>
            </div>
            <center>
                <table>
                    <?php
                        $MyConnection = mysqli_connect($Host, $User, $Pass, $DBName);
                        $SelectData = "SELECT id, task FROM $TBName";
                        $Result = mysqli_query($MyConnection, $SelectData);
                    ?>
                    <tr>
                        <th>Task</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        if (mysqli_num_rows($Result) > 0) {
                            while($Row = mysqli_fetch_assoc($Result)) {
                                echo "<tr>";
                                    $PK_ID = $Row['id'];
                                    echo "<td class='row_task'>" . htmlspecialchars($Row['task']) . "</td>";
                                    echo "<td class='row_action'>
                                            <a class='Update' href='edit_task.php?id=$PK_ID'>Update</a>
                                            <span>/</span>
                                            <a class='Delete' href='delete_task.php?id=$PK_ID'>Delete</a>
                                        </td>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr><td colspan='2'>No Tasks Found.</td></tr>";
                        }
                    ?>
                </table>
            </center>
            <div class="Footer">
                <center>
                    <p class="Credits">&copy; 2024 GJC-MSCS 2011-2014. All Rights Reserved.</p>
                </center>
            </div>
            <?php
                if (isset($_GET['addtask'])) {
                    if ($_GET['addtask'] == 'ok') {
                        echo "<script>
                                alert('New Task Successfully Recorded.');
                                window.history.replaceState({}, document.title, window.location.pathname);
                            </script>";
                    } elseif ($_GET['addtask'] == 'not') {
                        echo "<script>
                                alert('Error: Could not add New Task.');
                                window.history.replaceState({}, document.title, window.location.pathname);
                            </script>";
                    }
                }

                if (isset($_GET['update'])) {
                    if ($_GET['update'] == 'ok') {
                        echo "<script>
                                alert('Task Updated Successfully.');
                                window.history.replaceState({}, document.title, window.location.pathname);
                            </script>";
                    } elseif ($_GET['update'] == 'not') {
                        echo "<script>
                                alert('Error: Task could not be Updated.');
                                window.history.replaceState({}, document.title, window.location.pathname);
                            </script>";
                    }
                }

                if (isset($_GET['delete'])) {
                    if ($_GET['delete'] == 'ok') {
                        echo "<script>
                                alert('Task Deleted Successfully.');
                                window.history.replaceState({}, document.title, window.location.pathname);
                            </script>";
                    } elseif ($_GET['delete'] == 'not') {
                        echo "<script>
                                alert('Error: Task could not be Deleted.');
                                window.history.replaceState({}, document.title, window.location.pathname);
                            </script>";
                    }
                }
            ?>
        </div>
    </body>
</html>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->