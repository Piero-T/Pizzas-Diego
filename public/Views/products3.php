
<?php include_once '../Controllers/maincontroller.php' ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Minimarket Puka</title>

   <!-- Fuente de letra link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Css link  -->
   <link rel="stylesheet" href="../css/style.css">
   
</head>
<?php require '../Views/header.php';  ?>
<body class="menu">
    
<section id="menu" class="menu">
      <div class="categorias">
      <nav class="navbar-categorias">
        <a href="/Proyecto_Web_Minimarket/Views/products.php">Viveres</a>
        <a href="/Proyecto_Web_Minimarket/Views/products2.php">Higiene y Limpieza</a>
        <a href="/Proyecto_Web_Minimarket/Views/products3.php">Dulces</a>
        <a href="/Proyecto_Web_Minimarket/Views/products4.php">Snacks</a>
        <a href="/Proyecto_Web_Minimarket/Views/products5.php">Bebidas</a>
      </nav>
      </div>
   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE categoria = 'Dulces'" );
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){    
      ?>
      <div class="box">
         <div class="price">S/<?= $fetch_products['price'] ?></div>
         <img src="../uploaded_img/<?= $fetch_products['image'] ?>" alt="">
         <div class="name"><?= $fetch_products['name'] ?></div>
         <form action="" method="post">
            <input type="hidden" name="pid" value="<?= $fetch_products['id'] ?>">
            <input type="hidden" name="name" value="<?= $fetch_products['name'] ?>">
            <input type="hidden" name="price" value="<?= $fetch_products['price'] ?>">
            <input type="hidden" name="image" value="<?= $fetch_products['image'] ?>">
            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            <input type="submit" class="btn" name="add to cart" value="Agregar al carrito">
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No hay productos todavía.</p>';
      }
      ?>

   </div>
</section>
<script src="../js/script.js"></script>
</body>

