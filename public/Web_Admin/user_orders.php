<?php
include '../config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: admin_login.php');
    exit();
}

// Check if a user ID is provided in the URL query string
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    // Retrieve user orders from the database based on the provided user ID
    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
    $select_orders->execute([$user_id]);
    $user_orders = $select_orders->fetchAll(PDO::FETCH_ASSOC);
} else {
    $user_orders = [];
}

// Retrieve all user accounts from the database
$select_users = $conn->prepare("SELECT * FROM `users`");
$select_users->execute();
$users = $select_users->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom admin style link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>
    <?php include 'admin_header.php' ?>

    <section class="user-accounts">
        <h1 class="heading">User Accounts</h1>

        <div class="user-list">
            <ul>
                <?php foreach ($users as $user) { ?>
                    <li>
                        <a href="user_orders.php?user_id=<?= $user['id']; ?>">
                            <?= $user['name']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="orders">
        <h1 class="heading">Pedidos de Usuario</h1>

        <div class="box-container">
            <?php if (!empty($user_orders)) { ?>
                <?php foreach ($user_orders as $order) { ?>
                    <div class="box">
                        <p> Order Date & Time: <span><?= $order['placed_on']; ?></span> </p>
                        <p> Name: <span><?= $order['name']; ?></span> </p>
                        <p> Number: <span><?= $order['number']; ?></span> </p>
                        <p> Address: <span><?= $order['address']; ?></span> </p>
                        <p> Total Products: <span><?= $order['total_products']; ?></span> </p>
                        <p> Total Price: <span>S/<?= $order['total_price']; ?></span> </p>
                        <p> Payment Method: <span><?= $order['method']; ?></span> </p>
                        <p> Payment Status: <span><?= $order['payment_status']; ?></span> </p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="empty">No orders for the selected user.</p>
            <?php } ?>
        </div>
    </section>

    <script src="../js/admin_script.js"></script>
</body


