<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product])) {
        $_SESSION['cart'][$product]++;
    } else {
        $_SESSION['cart'][$product] = 1;
    }

    // Output styled confirmation before redirect
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Item Added</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center;
                padding-top: 100px;
            }
            .message {
                display: inline-block;
                background-color: #27ae60;
                color: white;
                padding: 20px 40px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                font-size: 20px;
            }
        </style>
        <meta http-equiv="refresh" content="2;url=dashboard.php">
    </head>
    <body>
        <div class="message">"' . htmlspecialchars($product) . '" added to your cart! Redirecting...</div>
    </body>
    </html>';
    exit;
}
