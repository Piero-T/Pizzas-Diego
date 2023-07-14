
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
<body>
<section class="order" id="order">

   <h1 class="heading">Ordena ahora</h1>

   <form action="" method="post">

   <div class="display-orders">

   <?php
         $grand_total = 0;
         $cart_item[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
              $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
              $grand_total += $sub_total; 
              $cart_item[] = $fetch_cart['name'].' ( '.$fetch_cart['price'].' x '.$fetch_cart['quantity'].' ) - ';
              $total_products = implode($cart_item);
              echo '<p>'.$fetch_cart['name'].' <span>('.$fetch_cart['price'].' x '.$fetch_cart['quantity'].')</span></p>';
            }
         }else{
            echo '<p class="empty"><span>El carrito está vacío.</span></p>';
         }
      ?>

   </div>

      <div class="grand-total"> Total a pagar : <span>S/<?= $grand_total; ?></span></div>

      <input type="hidden" name="total_products" value="<?= $total_products; ?>">
      <input type="hidden" name="total_price" value="<?= $grand_total; ?>">

      <div class="flex">
         <div class="inputBox">
            <span>Nombre :</span>
            <input type="text" name="name" value="<?php echo $name; ?>" class="box" placeholder="Nombre">
         </div>
         <div class="inputBox">
            <span>Método de Pago :</span>
            <select name="method" class="box">
               <option value="cash on delivery">Pagar al contado al Delivery</option>
               <option value="credit card">Tarjeta Bancaria</option>
               <option value="yape">Yape</option>
               <option value="plin">Plin</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Número Celular :</span>
            <input type="text" name="number" value="<?php echo $number; ?>" class= "box"placeholder="Celular">
          <!--  <input type="number" name="number" class="box" required placeholder="Ingresa tu número celular" min="900000000" max="999999999" onkeypress="if(this.value.length == 10) return false;"> -->
         </div>
         <div class="inputBox">
            <span>Dirección :</span>
            <input class="box" type="text" name="flat" value="<?php echo $address; ?>" placeholder="Dirección">

         </div>
         <div class="inputBox">
            <span>Correo :</span>
            <input class="box" type="text" name="email" value="<?php echo $email; ?>" placeholder="Correo electrónico">
         </div>
         <div class="inputBox">
            <span>Referencia de la dirección :</span>
            <input class="box" type="text" name="street" value="<?php echo $reference; ?>" placeholder="Referencia">
         </div>
      </div>

      <input type="submit" value="¡Ordena ya!" class="btn" name="order">

   </form>
</section>
<script src="../js/script.js"></script>
</body>