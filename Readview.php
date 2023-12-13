<?php

include "db_conn.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location:login.php");
}


?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .logout {
            padding: 10px;
            background: blue;
            color: white;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
        }

        .logout:hover {
            color: white;
            text-decoration: none;
        }

        .lo a:hover {
            transform: scale(1.2) !important;
        }

        button {

            float: right;

            background: rgb(35, 174, 202);

            padding: 10px 15px;

            color: #fff;

            border-radius: 5px;

            margin-right: 10px;

            border: none;

        }

        a {

            float: right;

            background: rgb(183, 225, 233);

            padding: 10px 15px;

            color: #fff;

            border-radius: 15px;

            margin-right: 10px;

            border: none;

            text-decoration: none;

        }

        .btn-sign {
            margin-top: 20px;
            background: blue;
        }
        a:hover{
            transform: scale(1.2);
            color: white !important;
        }

        button:hover {

            transform: scale(1.2);

        }
    </style>

</head>

<body>

    <div class="container">

        <h2>users</h2>

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>First Name</th>

                    <th>Last Name</th>

                    <th>Email</th>

                    <th>Gender</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                ?>

                        <tr>

                            <td><?php echo $row['user_id']; ?></td>

                            <td><?php echo $row['firstname']; ?></td>

                            <td><?php echo $row['lastname']; ?></td>

                            <td><?php echo $row['email']; ?></td>

                            <td><?php echo $row['gender']; ?></td>

                            <td>
                                <a class="btn btn-info" href="Update.php?ID=<?php echo $row['user_id'];?>">Edit</a>
                                <a class="btn btn-danger" href="Delete.php?ID=<?php echo $row['user_id'];?>">Delete</a>
                            </td>

                        </tr>

                <?php       }
                }

                ?>

            </tbody>

        </table>

        <a class="btn btn-sign" href="Destroy.php" name="logout">logout</a>

    </div>

</body>

</html>