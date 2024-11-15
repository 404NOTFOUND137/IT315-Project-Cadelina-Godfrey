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
            ?>
        </div>
    </body>
</html>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->