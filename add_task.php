<?php
    include 'Database_Information.php';
    $Task = $_POST['task'];

    $MyConnection = mysqli_connect($Host, $User, $Pass, $DBName);

    if (!$MyConnection) {
        die("Connection Error." . mysqli_connect_error());
    }

    $AddTask = "INSERT INTO $TBName (task) VALUES ('$Task')";

    if (mysqli_query($MyConnection, $AddTask)) {
        header("Location: index.php?addtask=ok");
    } else {
        header("Location: index.php?addtask=not");
    }
    mysqli_close($MyConnection);
?>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->