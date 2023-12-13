<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="dash.css">	
	<link rel="stylesheet" href="dash1.css">
		
	<style>

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

.dropbtn {
  color: rgb(7, 7, 7);
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  align-items: center;
  width: fit-content;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: lightblue}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
   
</head>
<body>

	<!-- for header part -->
	<header>
		<div class="logosec">
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				>
			</div>

			<div class="logosec">
				<div class="logo">Dashboard</div>
			</div>

		<nav class="headbar">

            <a href="index.html">Home</a>

            <a href="login.php">Login</a>
			
            <a href="#medicine">Medicine</a>

            <a href="services.php">Service</a>

            <a href="contact.html">Contact</a>

        </nav>


	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>

					
					<div class="dropdown">
					<div class="option2 nav-option">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAURJREFUSEvtltttAjEQRS+VAJ1AJSSVECpJOkk6IVQSdJAdOROPPTYr8cNIq/3wrM887ti70oNs9SCunuDZyr9I2khaS7pI+pL0nZ7qnveWeifpKIm3NeCvHvweMLBPQyNLjOyzbWvwWbCFktlHAXuTdEgBEMzewmfAFsqmlNUacNqA/fMZBUehOYhzytpWZGiOR6HAM5g2AP+1aMa9nnpj+JMWTpIo/RC4pl42qKrVCGy6xx60OSpprvOooWqC/GOtUvegHjykBQ/MAYAwopbLHoKyqQfOaoyC8UO178UH3nzfXGrgaIlbQTWhHrg8cUYyzr5dqAemXFxzMxaCLp1xGLpkj4egS6l6GNoCM8ecPOWFXuv5FLQFZo2xQmg1OMcgc1u7h0OijNxOBMCTf+SAln8bIZB1ioCnNu599AT3KrTY+hUlN0YfsdLLcAAAAABJRU5ErkJggg=="
							class="nav-img"
							alt="articles">
						<h3 buttonbutton class="dropbtn">Medicines</button>
						<div class="dropdown-content">
							<a href="Add_medicine.php" target=_parent>Add </br>Medicine</a>
							<a href="mng_medicine.php">Manage </br> Medicine</a>
						  </div>
					</div>
				</div>


					<div class="dropdown">
					<div class="option2 nav-option">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXFJREFUSEvtltFNA0EMRCedkEqASgiVAJVAKgEqgU5ATzqjuc3u2eRA9xP/RLpz/Dxe7yQ7bRS7jbi6gM+d/JWkg6QXSZ+VItVR30h6kMQnhd8kPRnkdXrHsxK8An6e1LRCaOAo6VGS5wDn2WJkYMZH0VEAv58mEKrJ3Wcjz8Afkji/pQiFHANwgmYY+TAy8Fc2sknt7ZQXjQIFfhYYpRTKwiHR6CowQD+3UQM9cLpg2aiz5aIZxsz1YpO5cn9yxhTxgq3qgPpisels9WJkiuPLKL9rDIQ7jFKHRj7jd4M5aaIKzgQAj8bi+qGciXQtNAOHBwO+bugUfDcLjdfuYkP4CAyQAiipRLvFvhfdDe+Be2dWgbfqHB5L+FOnB6641agRli1cjJyhk7XgimFk6t2n/bxnrBa8Rm005KrdgGa/WA6uuFSmlvduIH4rZn8Q/gPsNjps1MFL1lhR6jknW9wWyAzkt8By/gVcHtXaxM1G/Q1LGlgfU0HOdwAAAABJRU5ErkJggg=="	class="nav-img"
							alt="report">
							<h3 buttonbutton class="dropbtn">Customer</button>
								<div class="dropdown-content">
									<a href="Add_customer.php" target=_parent>Add </br>Customer</a>
									<a href="mng_cudtomer.php" target=_parent>Manage Customer</a>
								  </div>
							</div>
						</div>

					<div class="dropdown">
						<div class="option2 nav-option">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAXdJREFUSEvtl+tNBDEMhOc6gUqASoBKgEqASoBKoBPQd4qjOZNkH9rTAcLS/thN7LGdsZ3d6USyOxGuesA3ks42cupV0kd5qskMfCnpZSNANwPwrSSc2IsDE+H7EUDDJOBXEbkDk97HsgvvnpITn+X9QdJ9WuP9rhEMn3yt2nXgkTIG1gI3df+Be+d01FQ7uWBfpX6p6WA8pIMkLpASfeQ81axXSyWmn7HXMMbZRAkgbjgbz2U40q1O5QbiAIASNQ61ulhkhPUs6D5LujZd9pPJvSzpXNH6eo6QIQfKzhwc3xxgAN+saQAMCckCD6klusgA/eDC1sOB2cCZYI2MTn5y3vxe4N7IJOVRBZGKTSL2Ou/lOA+XTYBpIFOXg4OSKaUY8331Ga+ZTptE/PeBIYqzNM4qGoYTjI4VQ6K2xXLGMfGGZ4yxOSSa7BxpAwEwIKq0rre0vFHPXQrK/m93uNGFvjV11oD6XB9GvMb4Yp0f9wuzOIKlCl9nrYkfjmtz8gAAAABJRU5ErkJggg=="class="nav-img"
							alt="institution">
							<h3 button class="dropbtn">Stock</button>
								<div class="dropdown-content">
									<a href="stock.php">Stock</a>
								  </div>
							</div>
						</div>

						<div class="dropdown">
					<div class="option2 nav-option">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAadJREFUSEvFluFNAzEMhd1NYJLCJMAkhUmASYBJYJNW3yk+OW4S+8JJtdQfvUv88p7tdznIjeJwI1yZAb4TkQcR+SiH5j/xt4VEFpjkzyJyLKDfIvJYgL7Ms59yoPAQGeBXETk5Ni1gu+QtOsAIGJbvhY1XMQJmPWteeiXoAVNDJOxFBlj33rfAe8Batz2Am8xbwDQREo9iC2PyUHN6ZQ0PTF1/E2OxFZiUleQeGKYwjmIGuGLtgWGrhrCn1NrlOvtXznWOqJb3M4wruS3jaITsmSww5cmopE3G3opxppsV3AInRaqXWcYta+wlxYupV+jJvQSzUpOPrxOWSKDWU4L6p37V/gMMW4CRnRrjdlGtUemqxlnz6DVZVCoOioks4ec48uiWmrDWS8HIB4YGMsPaMhmN5NAyYZS1TcveNlprv33flJqH2UaxwHa8/P6qtr0a6/MZya2paKPZzq/6I7r6ZEbEJlzHpYwXDbWMj4/osqe3S3/ZGznaOjIjQ4mArfSAj77VyIozVTeNjGUmHG9pPP1pIwLIrynpXsCZw6XWZKVOJduy6ALtz2cfpJtlSQAAAABJRU5ErkJggg==" class="nav-img" alt="settings">
						<h3 class="dropbtn similar-font">Invoice</h3>
						<div class="dropdown-content">
							<a href="invoice.php" target="_parent" class="similar-font">Invoice</a>
							</div>
						</div>
					</div>

			<div class="nav-option logout">
				<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
				<a href="index.html" target="_parent" class="dropbtn similar-font">Logout</a>
			</div>

			</nav>
		</div>
		<div class="main">

			<div class="box-container">

				
				<div class="box box1">
					<a href="Add_medicine.php" target=_parent>
					<div class="text">
					<h2 class="topic-heading">Add  Medicine </h2>
					</div>
					</a>
					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
						alt="Views">
				</div>


				<div class="box box2">
					<a href="Add_customer.php" target=_parent>
					<div class="text">
						<h2 class="topic-heading">Add Customer</h2>
					</div>
				</a>
					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes">
				</div>

				<div class="box box3">
					<a href="add_supplier.php" target=_parent>
					<div class="text">
						<h2 class="topic-heading">New Supplier</h2>
					</div></a>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments">
				</div>

				<div class="box box4">
					<a href="invoice.php" target=_parent>
					<div class="text">
						<h2 class="topic-heading">Invoice</h2>
					</div>
				</a>
					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div>
			</div>

			<hr style="height:20%;width:50%;text-align:left;margin-left:0">

			<table id="medicineTable">
				<tr>
					<th colspan="2">
						<h2>Medicine Database</h2>
					</th>
				</tr>
				<tr>
					<td colspan="2" id="formContainer">
						<input type="text" id="searchInput" name="searchInput" onkeyup="searchMedicine()" placeholder="Search for medicines..." />
					</td>
				</tr>
				<tr>
					<th>ID</th>
					<th>Name</th>
				</tr>
		
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
		
				// Fetch medicine data from the database
				$sql = "SELECT id, name FROM medicines";
				$result = $conn->query($sql);
		
				if ($result->num_rows > 0) {
					// Output data of each row
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["name"] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='2'>No medicines found</td></tr>";
				}
		
				$conn->close();
				?>
			</table>
		
			<script>
				function searchMedicine() {
					var input, filter, table, tr, td, i, txtValue;
					input = document.getElementById("searchInput");
					filter = input.value.toUpperCase();
					table = document.getElementById("medicineTable");
					tr = table.getElementsByTagName("tr");
		
					for (i = 0; i < tr.length; i++) {
						td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponds to the Name column
						if (td) {
							txtValue = td.textContent || td.innerText;
							if (txtValue.toUpperCase().indexOf(filter) > -1) {
								tr[i].style.display = "";
							} else {
								tr[i].style.display = "none";
							}
						}
					}
				}
			</script>
			
		</div>
	</div>

	<script src="./index.js"></script>
</body>
</html>





