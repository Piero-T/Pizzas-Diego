<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">
      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Inicio</a>
         <a href="admin_products.php">Productos</a>
         <a href="admin_orders.php">Pedidos</a>
         <a href="admin_accounts.php">Admins</a>
         <a href="users_accounts.php">Usuarios</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="admin_profile_update.php" class="btn">Actualizar perfil</a>
         <a href="logout.php" class="delete-btn">Salir</a>
         <div class="flex-btn">
            <a href="admin_register.php" class="option-btn">Registrar Admin</a>
         </div>
      </div>
   </section>

</header>