<?php include '../config.php'; ?>
<header class="header">
<?php require '../Models/iconologin.php';  ?>
<?php require '../Models/iconoregister.php';  ?>
<?php require '../Models/iconopedido.php';  ?>
<?php require '../Models/iconocarrito.php';  ?>
   <section class="flex">

      <a href="/Proyecto_Web_Minimarket/Views/home.php" class="logo"><span>M</span>inimarket <span>P</span>uka</a>

      <nav class="navbar">
         <a href="/Proyecto_Web_Minimarket/Views/home.php">Inicio</a>
         <a href="/Proyecto_Web_Minimarket/Views/nosotros.php">Nosotros</a>
         <a href="/Proyecto_Web_Minimarket/Views/products.php">Productos</a>
         <a href="/Proyecto_Web_Minimarket/Views/faq.php">FAQ</a>
         <a href="/Proyecto_Web_Minimarket/Views/pedidos.php">Ordenar</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
            
         <div id="user-btn" class="fas fa-user tooltip">
            <span class="tooltiptext">Login</span>
         </div>


         <div id="register-btn" class="fas fa-user-circle tooltip">
            <span class="tooltiptext">Register</span>
         </div>


         <div id="order-btn" class="fas fa-box tooltip">
            <span class="tooltiptext">Mis Pedidos</span>
         </div>


         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>

         <div id="cart-btn" class="fas fa-shopping-cart tooltip"><span>(<?= $total_cart_items; ?>)</span>
            <span class="tooltiptext">Carrito</span>
         </div>
         
      </div>
   </section>
   <script src="js/script.js"></script>
   
</header>
