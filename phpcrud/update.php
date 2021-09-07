<?php
    require('server.php');

    if(isset($_POST['edit'])) {
        $email = $_POST['email'];
        $query = "SELECT * FROM user WHERE email='$email'";
        $sql = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['update'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $accessRole = $_POST['accessRole'];

        $query2 = "UPDATE user SET firstName='$firstName', lastName='$lastName', gender='$gender', accessRole='$accessRole' WHERE email='$email'";
        $sql2 = mysqli_query($connection, $query2);
        echo "<script> alert('Successfully updated') </script>";
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>UPDATE</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="mt-5 container">
        <form class="" action="update.php" method="POST">
            <h6>Update User</h6>
            <input type="text" name="firstName" placeholder="First name" value="<?php echo $row['firstName']; ?>"/>
            <input type="text" name="lastName" placeholder="Last name" value="<?php echo $row['lastName']; ?>" />
            <input type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly/>  
            <select name="gender">
                <option value="">Choose gender...</option>
                <option value="Male" <?php echo ($row['gender']=='Male' ? 'Selected' : ''); ?>>Male</option>
                <option value="Female" <?php echo ($row['gender']=='Female' ? 'Selected' : ''); ?>>Female</option>
            </select>
            <select name="accessRole">
                <option value="">Choose role...</option>
                <option value="Admin" <?php echo ($row['accessRole']=='Admin' ? 'Selected' : ''); ?>>Admin</option>
                <option value="User" <?php echo ($row['accessRole']=='User' ? 'Selected' : ''); ?>>User</option>
            </select>
        
            <input type="submit" name="update" value="Update"/>
        </form>
    </div>
    
</body>
</html>