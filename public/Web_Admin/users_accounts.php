<?php

include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `user` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cuentas Usuarios</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom admin style link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include 'admin_header.php' ?>

<section class="accounts">

   <h1 class="heading">Cuentas de Usuarios</h1>

   <form class="barra-busqueda" method="GET" action="">
      <input type="text" name="search_term" placeholder="Buscar usuario...">
      <button type="submit">Buscar</button>
   </form>

   <div class="box-container">

   <?php
      // Check if search term is set in query string
      if(isset($_GET['search_term'])){
         $search_term = $_GET['search_term'];
         // Prepare SQL statement with a LIKE query
         $select_accounts = $conn->prepare("SELECT * FROM `user` WHERE `name` LIKE :search_term OR `email` LIKE :search_term");
         $select_accounts->bindValue(':search_term', '%' . $search_term . '%');
      }else{
         // Prepare SQL statement without a WHERE clause
         $select_accounts = $conn->prepare("SELECT * FROM `user`");
      }
      
      $select_accounts->execute();

      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
   <div class="box">
      <p> Nombre de Usuario : <span><?= $fetch_accounts['name']; ?></span> </p>
      <p> Correo Electrónico : <span><?= $fetch_accounts['email']; ?></span> </p>
      <a href="user_orders.php?user_id=<?= $fetch_accounts['id']; ?>" class="ver-ordenes-btn">Ver pedidos</a>


   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No hay cuentas disponibles.</p>';
      }
   ?>

   </div>

</section>




<script src="../js/admin_script.js"></script>

</body>
</html>