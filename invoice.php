<html>
<head>
  <title>Invoice Form</title>
  <!-- Include Bootstrap CSS framework -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add some custom CSS styles -->
  <style>
    /* Add a background color and a logo to the header */
    .header {
      background-color: #007bff;
      padding: 10px;
      border-radius: 20px;
    }
    .logo {
      width: 100px;
      height: 100px;
    }
    /* Add some margin and padding to the form */
    .form {
      margin: 20px;
      padding: 20px;
    }
    /* Add some margin and border to the table */
    .table {
      width:auto;
      margin: 20px;
      border: 1px solid #007bff;
    }
    /* Add some color and font to the footer */
    .footer {
      background-color: #007bff;
      border-radius: 20px;
      color: white;
      font-weight: bold;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Create a header with a logo and a title -->
  <div class="header">
    <img src="logo.jpg" alt="Logo" class="logo">
    <h1>Invoice Form</h1>
  </div>
  <!-- Create a form to collect the invoice data -->
  <div class="form">
    <form action="invoice1.php" method="post">
      <div class="form-group">
        <label for="invoice_number">Invoice Number:</label>
        <input type="text" name="invoice_number" id="invoice_number" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="customer_address">Customer Address:</label>
        <input type="text" name="customer_address" id="customer_address" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="invoice_date">Invoice Date:</label>
        <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="invoice_amount">Invoice Amount:</label>
        <input type="number" name="invoice_amount" id="invoice_amount" class="form-control" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Save Invoice" class="btn btn-primary">
      </div>
    </form>
  </div>
  <!-- Create a table to display the invoice data from the database -->
  <div class="table">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Invoice Number</th>
          <th>Customer Name</th>
          <th>Customer Address</th>
          <th>Invoice Date</th>
          <th>Invoice Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include the database connection file
        include "db_conn.php";

        // Prepare an SQL statement to select all the invoice data from the database
        $sql = "SELECT * FROM invoice";

        // Execute the SQL statement and get the result set
        $result = $conn->query($sql);

        // Check if the result set is not empty
        if ($result->num_rows > 0) {
          // Loop through the result set and fetch each row as an associative array
          while($row = $result->fetch_assoc()) {
            // Display the row data in a table row
            echo "<tr>";
            echo "<td>" . $row["invoice_number"] . "</td>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "<td>" . $row["customer_address"] . "</td>";
            echo "<td>" . $row["invoice_date"] . "</td>";
            echo "<td>" . $row["invoice_amount"] . "</td>";
            echo "</tr>";
          }
        } else {
          // Display a message if the result set is empty
          echo "<tr>";
          echo "<td colspan='5'>No invoice data found.</td>";
          echo "</tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
  <!-- Create a footer with some information -->
  <div class="footer">
  
    <p>Powered by PHP</p>
  </div>
</body>
</html>
