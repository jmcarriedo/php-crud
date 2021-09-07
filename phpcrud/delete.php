<?php
    require('server.php');

    if(isset($_POST['delete'])) {
        $email = $_POST['email'];
        $query = "DELETE FROM user WHERE email='$email'";
        $sql = mysqli_query($connection, $query) OR trigger_error('Query failed ' . $query);
        echo "<script> alert('Successfully deleted') </script>";
        header('location: index.php');
    }
?>