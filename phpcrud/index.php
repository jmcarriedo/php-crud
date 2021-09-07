<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PHP CRUD</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- <?php require('retrieve.php'); ?> -->
    <div class="mt-5 container">
        <form class="" action="create.php" method="POST">
            <h6>Create User</h6>
            <input type="text" name="firstName" placeholder="First name" />
            <input type="text" name="lastName" placeholder="Last name" />
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />   
            <select name="gender">
                <option value="">Choose gender...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <select name="accessRole">
                <option value="">Choose role...</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <input type="submit" name="create" value="Create"/>
        </form>
    </div>

    <div class="container">
        <table class="mt-5 table table-hover">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Access Role</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_array($sqlUsers)) { ?>
            <tr>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['lastName']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['accessRole']; ?></td>
                <td class="d-flex flex-direction-row">
                    <form class="pe-3" action="update.php" method="POST">
                        <input type="submit" name="edit" value="Edit"/>
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                    </form>
                    <form action="delete.php" method="POST">
                        <input type="submit" name="delete" value="Delete" onclick="return (confirm('Are you sure you want to delete?'));"/>
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>"/>
                    </form>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>
</body>
</html>