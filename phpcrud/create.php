<?php
    require('server.php');

    if(isset($_POST['create'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $accessRole = $_POST['accessRole'];

        $query = "INSERT into user (firstName, lastName, email, gender, password, accessRole) VALUES ('$firstName', '$lastName', '$email', '$gender', '$password', '$accessRole')";
        $sqlCreate = mysqli_query($connection, $query) OR trigger_error('Query failed SQL ' . $query);

        echo "<script> alert('Successfully created') </script>";
        echo "<script> window.location.href='index.php' </script>";
    } else {
        echo "<script> window.location.href='index.php' </script>";
    }
?>