<?php
    $Host = "localhost";
    $User = "root";
    $Pass = "";
    $DBName = "todoapp_gjc_mscs";
    $TBName = "task";

    $Connection = mysqli_connect($Host, $User, $Pass);

    if (!$Connection) {
        die ("Connection Error." . mysqli_connect_error());
    }

    $CreateDB = "CREATE DATABASE IF NOT EXISTS $DBName";

    if (!mysqli_query($Connection, $CreateDB)) {
        echo "Error Creating Database." . mysqli_errno($Connection);
    }

    mysqli_select_db($Connection, $DBName);
    
    $CreateTB = "CREATE TABLE IF NOT EXISTS $TBName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        task VARCHAR(255) NOT NULL
    )";

    if (!mysqli_query($Connection, $CreateTB)) {
        echo "<br>Error Creating Database Table." . mysqli_error($Connection);
    }
?>
    <!-- 2024 Godfrey J. Cadelina All Rights Reserved -->