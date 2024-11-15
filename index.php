<?php
    include 'Database_Information.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TO DO LIST</title>
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
                                    </td>";
                            echo "</tr>";
                        }
                    }
                    else {
                        echo "<tr><td>No Tasks Found.</td></tr>";
                    }
                ?>
            </table>

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
            ?>
        </div>
    </body>
</html>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->