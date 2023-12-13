<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            width: 100%;
        }

        h1 {
            margin: 0;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .delete-btn {
            background-color: #ff6666;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #ff4d4d;
        }
    </style>
</head>

<body>

    <h2>Medicine Data</h2>

    <?php
    // Replace with your database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pms";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        $id_to_delete = $_POST['delete'];
        $sql_delete = "DELETE FROM medicines WHERE id = $id_to_delete";
        $conn->query($sql_delete);
    }

    // Fetch medicine data from the database
    $sql = "SELECT id, name, quantity, price, expiry FROM medicines";
    $result = $conn->query($sql);

    // Display medicine data in a table
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['expiry']}</td>
                    <td>
                        <form method='post'>
                            <button type='submit' class='delete-btn' name='delete' value='{$row['id']}'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No medicine data available.";
    }

    // Close connection
    $conn->close();
    ?>

</body>

</html>
