<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #3498db;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }

        input[type="tel"] {
            /* Additional styling for phone input */
            appearance: none;
            -moz-appearance: textfield;
            background-position: 98% 50%;
            background-size: 20px;
            background-image: url('phone-icon.png'); /* Replace with actual icon URL */
        }

        input[type="email"] {
            /* Additional styling for email input */
            appearance: none;
            -moz-appearance: textfield;
            background-position: 98% 50%;
            background-size: 20px;
            background-image: url('email-icon.png'); /* Replace with actual icon URL */
        }

        input[type="submit"] {
            background-color: #2980b9;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #1f65a6;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 30px;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:last-child {
            border-bottom: 2px solid #333;
        }
    </style>
</head>
<body>
    <h1>Enter Supplier Details</h1>
    <form method="POST" action="Add_supplier.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Submit">
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pms";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, address, phone, email FROM supplier";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["email"]. "</td></tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </table>
</body>
</html>
