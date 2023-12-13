<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f3f3f3;
            background-image: url('background.jpg'); /* Replace with your background image */
            background-size: cover;
            color: #333;
        }

        h2 {
            color: #4285f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4285f4;
            color: #fff;
        }

        form {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], input[type="tel"], textarea {
            padding: 10px;
            width: calc(100% - 20px);
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"], button {
            padding: 10px;
            cursor: pointer;
            background-color: #4285f4;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        button {
            background-color: #dc3545;
            margin-left: 10px;
        }

        a {
            color: #4285f4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            color: #777;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Customer List</h2>

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
    if(isset($_POST['add'])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $prescription = $_POST["prescription"];

        // Insert new customer into the database
        $sql = "INSERT INTO customer (name, phone, prescription) VALUES ('$name', '$phone', '$prescription')";

        if ($conn->query($sql) === TRUE) {
            echo "customer added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['edit'])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $prescription = $_POST["prescription"];
        $id = $_POST["id"];

        // Update customer details in the database
        $sql = "UPDATE customer SET name='$name', phone='$phone', prescription='$prescription' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "customer updated successfully";
        } else {
            echo "Error updating customer: " . $conn->error;
        }
    }
}

            
// Delete customer data
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Delete the customer from the database
    $delete_sql = "DELETE FROM customer WHERE id=$delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "customer deleted successfully";
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
}


// Retrieve data from the database
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Prescription</th><th>Action</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["prescription"]."</td>";
        echo "<td><a href='?edit=".$row["id"]."'>Edit</a> | <a href='?delete=".$row["id"]."'>Delete</a></td>";
        echo "<td>
        <a href='edit.php?id=".$row["id"]."'>Edit</a> | 
        <a href='?delete=".$row["id"]."'>Delete</a>
      </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Get the customer details based on the ID for editing
if(isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_sql = "SELECT * FROM customer WHERE id=$edit_id";
    $edit_result = $conn->query($edit_sql);

    if ($edit_result->num_rows > 0) {
        $edit_row = $edit_result->fetch_assoc();
        $edit_name = $edit_row["name"];
        $edit_phone = $edit_row["phone"];
        $edit_prescription = $edit_row["prescription"];

        // Display the edit form
        echo "
        <h2>Edit customer</h2>
        <form method='post' action=''>
            <input type='hidden' name='id' value='$edit_id'>
            
            <label for='name'>Name:</label>
            <input type='text' name='name' value='$edit_name' required>

            <label for='phone'>Phone:</label>
            <input type='tel' name='phone' value='$edit_phone' required>

            <label for='prescription'>Prescription:</label>
            <textarea name='prescription' rows='4' required>$edit_prescription</textarea>

            <input type='submit' name='edit' value='Update customer'>
        </form>
        ";
    } else {
        echo "customer not found";
    }
}

$conn->close();
?>

<h2>Add New Customer</h2>

<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="phone">Phone:</label>
    <input type="tel" name="phone" required>

    <label for="prescription">Prescription:</label>
    <textarea name="prescription" rows="4" required></textarea>

    <input type="submit" name="add" value="Add Customer">
</form>

<footer>
    <p>&copy; 2023 customer Management. All rights reserved.</p>
</footer>

</body>
</html>
