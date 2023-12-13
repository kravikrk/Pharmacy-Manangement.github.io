<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add a link to a CSS file that contains the style rules -->
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <!-- Use a class attribute instead of inline style for the logo image -->
        <form action="login.php" method="post">
            <h1>Login</h1>
            <!-- Use a label element to associate the input with a text -->
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <br>
            <button class="btn" input type="submit" value="Sign-In">login</button>
        </form>

        <?php
            if (isset($_GET['login']) && $_GET['login'] == 'failed') {
                echo '<p class="error-message">Your username or password was incorrect</p>';
            }
        ?>

    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Replace with your database connection details
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "pms";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Verify the password using password_verify
        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            // Start a secure session
            session_start();

            // Check if user is not already redirected
            if (!isset($_SESSION['redirected'])) {
                echo 'Login successful';
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $userId;

                // Set the redirected flag to prevent multiple redirects
                $_SESSION['redirected'] = true;

                header('Location: dash.html');
                exit;
            } else {
                // Redirect to a different page or display an error message
                header('Location: already_redirected.html');
                exit;
            }
        } else {
            header('Location: dash.php?login=failed');
            exit;
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>

</html>
