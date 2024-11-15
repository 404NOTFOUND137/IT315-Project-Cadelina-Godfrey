<?php
    include 'Database_Information.php';

    $PK_ID = $_GET['id'];

    $MyConnection = mysqli_connect($Host, $User, $Pass, $DBName);
    
    $GetInfo = "SELECT * FROM $TBName WHERE id = $PK_ID";
    $Result = mysqli_query($MyConnection, $GetInfo);
    $Row = mysqli_fetch_assoc($Result);

    if (!$MyConnection) {
        die("Connection Error." . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Task</title>
        <style>
            * {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 100%;
                margin: 0px;
                padding: 0px;
            }
            .Form {
                border: 1px solid black;
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
            .Cancel {
                font-size: 70%;
                padding: 5px 20px;
                margin-bottom: 10px;
                background-color: skyblue;
                border: 1px solid black;
                text-decoration: none;
                color: black;
            }
            .Cancel:hover {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="Form">
            <form method="post">
                <label for="task" class="Label">Please Enter your Task Below</label><br>
                <input type="text" name="task" class="Task" value="<?php echo $Row['task']; ?>" required><br>
                <a href="index.php" class="Cancel">Cancel</a>
                <input type="submit" value="Update" class="Submit">
            </form>
        </div>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $Task = $_POST['task'];
                $UpdateTask = "UPDATE $TBName SET task = '$Task' WHERE id = $PK_ID";
                if (mysqli_query($MyConnection, $UpdateTask)) {
                    header("Location: index.php?update=ok");
                } else {
                    header("Location: index.php?update=not");
                }
            }
        ?>
    </body>
</html>
<?php mysqli_close($MyConnection); ?>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->