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
<body></body>
<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="accordion-container">

      <div class="accordion active">
      <div class="accordion-heading">
            <span>¿Como hago un pedido?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
         Puedes hacer tu pedido ingresando los datos correspondientes en el apartado Pedidos y dando click en “ORDENA YA”.
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>¿Cuanto tarda en llegar un pedido?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
         Manejamos un tiempo promedio de entrega de 30 minutos. Pero el tiempo exacto dependerá el lugar de entrega y por ende se te indicará cuando hagas tu pedido mediante una llamada.
         </p>
      </div>

      <div class="accordion">
         <div class="accordion-heading">
            <span>¿Puedo pagar el delivery cuando llegue a mi casa?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
         ¡Claro! Si el pago es en efectivo, puedes pagarlo cuando recibas el pedido, sólo debes precisar el monto con el cuál pagarás para que el Delivery tenga el cambio listo.
         No se aceptan dólares.
         </p>
      </div>


      <div class="accordion">
         <div class="accordion-heading">
            <span>¿Hay monto mínimo para pedir delivery?</span>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accrodion-content">
         Si tenemos monto mínimo para delivery. El consumo mínimo para que puedas realizar Delivery es de S/25.
         </p>
      </div>

   </div>
</section>
<script src="../js/script.js"></script>
</body>