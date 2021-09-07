<?php
    require('server.php');

    $query = "SELECT * from user";
    $sqlUsers = mysqli_query($connection, $query);
?>