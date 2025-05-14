<?php
include_once("connection.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grocery Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fbe7;
            color: #333;
        }

        header {
            background-color: #43a047;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }

        h2 {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 30px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .category-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-align: center;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .category-card h3 {
            margin: 15px 0 10px;
            color: #388e3c;
        }

        .category-card p {
            font-size: 15px;
            color: #555;
        }

        a.button {
            display: inline-block;
            margin-top: 40px;
            text-decoration: none;
            background-color: #43a047;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #2e7d32;
        }

        @media (max-width: 600px) {
            .category-card p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Grocery Library</h1>
</header>

<div class="container">
    <h2>Explore Our Resources</h2>

    <div class="category-grid">
        <div class="category-card">
            <img src="Healthy-Fruit-Salad.jpg" alt="Recipes">
            <h3>Healthy Recipes</h3>
            <p>Browse meal plans and recipes using fresh grocery items.</p>
        </div>
        <div class="category-card">
            <img src="https://via.placeholder.com/300x150?text=Storage+Tips" alt="Storage">
            <h3>Storage Tips</h3>
            <p>Learn how to store fruits, vegetables, and frozen items properly.</p>
        </div>
        <div class="category-card">
            <img src="https://via.placeholder.com/300x150?text=Nutrition" alt="Nutrition">
            <h3>Nutrition Guides</h3>
            <p>Understand the nutritional value of what you eat every day.</p>
        </div>
        <div class="category-card">
            <img src="https://via.placeholder.com/300x150?text=Budgeting" alt="Budgeting">
            <h3>Grocery Budgeting</h3>
            <p>Tips and tricks for saving money while grocery shopping.</p>
        </div>
    </div>

    <div style="text-align: center;">
        <a href="dashboard.php" class="button">Back to Dashboard</a>
    </div>
</div>

</body>
</html>
