<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Online Grocery Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 40px;
            background-color: #f9f9f9;
        }
        .cart-summary {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: inline-block;
        }
        h2 {
            color: #2c3e50;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        li {
            font-size: 18px;
            margin: 10px 0;
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .checkout-btn {
            background-color: #27ae60;
            color: white;
        }
        .checkout-btn:hover {
            background-color: #219150;
        }
        .clear-btn {
            background-color: #e74c3c;
            color: white;
        }
        .clear-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="cart-summary">
    <h2>Your Cart</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $item => $qty): ?>
                <li><?php echo htmlspecialchars($item); ?> x <?php echo $qty; ?></li>
            <?php endforeach; ?>
        </ul>
        <form action="clear_cart.php" method="POST">
            <button class="btn clear-btn" type="submit">Clear Cart</button>
        </form>
        <button class="btn checkout-btn" onclick="alert('Checkout successful! (Simulation)')">Confirm Checkout</button>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <br><
