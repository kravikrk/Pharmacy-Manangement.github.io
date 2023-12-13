<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
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
            color: #e74c3c;
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
        input[type="text"],
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

        input[type="submit"] {
            background-color: #c0392b;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #a5281a;
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
            background-color: #e74c3c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:last-child {
            border-bottom: 2px solid #333;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.2;
        }
    </style>
</head>
<body>
    <img src="background.jpg" alt="Background" class="background">
    <h1>Enter Patient Details</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        <label for="prescription">Prescription:</label>
        <input type="text" id="prescription" name="prescription" required>
        <input type="submit" value="Submit">
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Prescription</th>
        </tr>
        <?php
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

            // Process form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $prescription = $_POST["prescription"];

                // Insert data into the 'customer' table
                $sql = "INSERT INTO customer (name, phone, prescription) VALUES ('$name', '$phone', '$prescription')";

                if ($conn->query($sql) === TRUE) {
                    echo "Record added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Display data from the 'customer' table
            $sql = "SELECT name, phone, prescription FROM customer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["prescription"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>0 results</td></tr>";
            }

            // Close connection
            $conn->close();
        ?>
    </table>
</body>
</html>
