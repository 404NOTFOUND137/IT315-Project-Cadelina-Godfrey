<?php
    include 'Database_Information.php';
    $PK_ID = $_GET['id'];

    $MyConnection = mysqli_connect($Host, $User, $Pass, $DBName);

    $DeleteTask = "DELETE FROM $TBName WHERE id = $PK_ID";

    if (mysqli_query($MyConnection, $DeleteTask)) {
        header("Location: index.php?delete=ok");
    }
    else {
        header("Location: index.php?delete=not");
    }
    mysqli_close($MyConnection);
?>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->