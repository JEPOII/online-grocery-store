<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (!empty($email) && !empty($password)) {
        $result = $conn->query("SELECT user_id, name, password, role FROM Users WHERE email = '$email'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["role"] = $row['role'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No user found with that email.";
        }
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
    logAction($conn, $_SESSION['user_id'], "Logged in");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Grocery Store - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('background.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #2e7d32;
        }

        .login-container label {
            display: block;
            margin: 15px 0 5px;
            font-weight: 600;
            color: #4e4e4e;
            text-align: left;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .login-container button {
            background-color: #43a047;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            width: 100%;
        }

        .login-container button:hover {
            background-color: #388e3c;
        }

        .login-container a {
            display: block;
            margin-top: 15px;
            color: #2e7d32;
            text-decoration: none;
            font-size: 15px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .login-container h2 {
                font-size: 24px;
            }

            .login-container input,
            .login-container button {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login to Grocery Store</h2>
    <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>
    <a href="register.php">Don't have an account? Register</a>
</div>

</body>
</html>
