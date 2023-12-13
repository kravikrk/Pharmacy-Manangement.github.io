<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Details</title>
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
        input[type="number"],
        input[type="date"],
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

        input[type="submit"] {
            background-color:  #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.1s;
        }

        input[type="submit"]:hover {
            background-color: #2185d0;
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

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.2;
        }

        a.button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 15px;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        a.button:hover {
            background-color: #2185d0;
        }
    </style>
</head>
<body>
    <img src="background.jpg" alt="Background" class="background">
    <h1>Enter Medicine Details</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <label for="expiry">Expiration Date:</label>
        <input type="date" id="expiry" name="expiry" required>
        <input type="submit" value="Submit">
        <a href="dash.php" class="button">Home</a>
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Expiration Date</th>
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
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $expiry = $_POST["expiry"];

                // Insert data into the 'customer' table
                $sql = "INSERT INTO medicines (name, quantity, price, expiry) VALUES ('$name', '$quantity', '$price', '$expiry')";

                if ($conn->query($sql) === TRUE) {
                    echo "Record added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Display data from the 'customer' table
            $sql = "SELECT name, quantity, price, expiry FROM medicines";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["price"]. "</td><td>" . $row["expiry"]. "</td></tr>";
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



