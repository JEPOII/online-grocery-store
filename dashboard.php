<?php

if (!empty($_SESSION['cart'])) {
    echo "<h3>Your Cart:</h3><ul>";
    foreach ($_SESSION['cart'] as $item => $qty) {
        echo "<li>$item x $qty</li>";
    }
    echo "</ul>";
}

include_once("connection.php");
include_once("function.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT name FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
$result = $conn->query("SELECT name, profile_picture FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
echo "<img src='uploads/" . $user['profile_picture'] . "' width='100' height='100'><br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Grocery Store - Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #2c3e50;
            margin: 20px 0;
        }

        nav {
            background-color: #2c3e50;
            padding: 15px 0;
            margin-bottom: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        nav a:hover {
            background-color: #e74c3c;
        }

        .content {
            background-color: #ffffff;
            padding: 40px 20px;
            margin: 0 auto 80px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .content h1 {
            color: #27ae60;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .content h3 {
            font-size: 24px;
            color: #34495e;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            color: #7f8c8d;
            line-height: 1.6;
        }

        .grocery-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .grocery-section div {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            min-width: 250px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .grocery-section div:hover {
            transform: translateY(-5px);
        }

        .grocery-section div img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .grocery-section div h4 {
            color: #2c3e50;
            font-size: 22px;
            margin-top: 15px;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .grocery-section {
                flex-direction: column;
                align-items: center;
            }

            .grocery-section div {
                width: 80%;
            }

            nav a {
                display: block;
                margin: 10px auto;
            }
        }
        .purchase-btn {
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #27ae60;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
        }

        .purchase-btn:hover {
                background-color:rgb(184, 85, 20);
        }

    </style>
</head>
<body>

    <h2>Welcome, <?php echo $user['name']; ?>!</h2>

    <nav>
        <a href="library.php">Library</a>
        <?php if (isAdmin()): ?>
            <a href="manage_users.php">Manage Users</a>
        <?php endif; ?>
        <a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
        <a href="update_profile.php">Update Profile</a>
        <a href="checkout.php" style="display:inline-block; margin-top:20px; color:#27ae60; font-weight:bold;">Go to Checkout</a>

    </nav>

    <div class="grocery-section">
    <div>
        <img src="fruits123.png" alt="Fruits">
        <h4>Fruits</h4>
        <p>Browse and manage all available fresh fruits. Check out the latest fruits we have in store!</p>
        <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product" value="Fruits">
    <button type="submit" class="purchase-btn">Purchase</button>
</form>
    </div>
    <div>
        <img src="veges123.png" alt="Vegetables">
        <h4>Vegetables</h4>
        <p>Explore the variety of fresh vegetables for your daily needs. We have the best quality products.</p>
        <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product" value="Fruits">
    <button type="submit" class="purchase-btn">Purchase</button>
</form>
    </div>
    <div>
        <img src="snacks.png" alt="Snacks">
        <h4>Snacks</h4>
        <p>Check out our collection of snacks. Perfect for a quick treat or a party!</p>
        <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product" value="Fruits">
    <button type="submit" class="purchase-btn">Purchase</button>
</form>
    </div>
</div>


    <footer>
        <p>&copy; 2025 Online Grocery Store | All Rights Reserved</p>
    </footer>

</body>
</html>
