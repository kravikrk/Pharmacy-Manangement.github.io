<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medicines Management</title>
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

<h2>medicines List</h2>

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
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $expiry = $_POST["expiry"];

        // Insert data into the 'customer' table
        $sql = "INSERT INTO medicines (name, quantity, price, expiry) VALUES ('$name', '$quantity', '$price', '$expiry')";

        if ($conn->query($sql) === TRUE) {
            echo "medicines added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['edit'])) {
        $name = $_POST["name"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $expiry = $_POST["expiry"];
        $id = $_POST["id"];

        // Update medicines details in the database
        $sql = "UPDATE medicines SET name='$name', quantity='$quantity', price='$price', expiry='$expiry' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "medicines updated successfully";
        } else {
            echo "Error updating medicines: " . $conn->error;
        }
    }
}

            
// Delete medicines data
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Delete the medicines from the database
    $delete_sql = "DELETE FROM medicines WHERE id=$delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "medicines deleted successfully";
    } else {
        echo "Error deleting medicines: " . $conn->error;
    }
}


// Retrieve data from the database
$sql = "SELECT * FROM medicines";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>quantity</th><th>price</th><th>expiry</th><th>Action</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["quantity"]."</td><td>".$row["price"]."</td><td>".$row["expiry"]."</td>";
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

// Get the medicines details based on the ID for editing
if(isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_sql = "SELECT * FROM medicines WHERE id=$edit_id";
    $edit_result = $conn->query($edit_sql);

    if ($edit_result->num_rows > 0) {
        $edit_row = $edit_result->fetch_assoc();
        $edit_name = $edit_row["name"];
        $edit_quantity = $edit_row["quantity"];
        $edit_price = $edit_row["price"];
        $edit_expiry = $edit_row["expiry"];

        // Display the edit form
        echo "
        <h2>Edit medicines</h2>
        <form method='post' action=''>
            <input type='hidden' name='id' value='$edit_id'>
            
            <label for='name'>Name:</label>
            <input type='text' name='name' value='$edit_name' required>

            <label for='quantity'>quantity:</label>
            <input type='tel' name='quantity' value='$edit_quantity' required>

            <label for='price'>price:</label>
            <textarea name='price' rows='4' required>$edit_price</textarea>

            <label for='expiry'>expiry:</label>
            <textarea name='expiry' rows='4' required>$edit_expiry</textarea>

            <input type='submit' name='edit' value='Update medicines'>
        </form>
        ";
    } else {
        echo "medicines not found";
    }
}

$conn->close();
?>

<h2>Add New medicines</h2>

<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="quantity">quantity:</label>
    <input type="tel" name="quantity" required>

    <label for="price">price:</label>
    <textarea name="price" rows="4" required></textarea>

    <label for="expiry">expiry:</label>
    <input type="date" name="expiry" required>

    <input type="submit" name="add" value="Add medicines">
</form>

<footer>
    <p>&copy; 2023 Pharmacy Management. All rights reserved.</p>
</footer>

</body>
</html>
 