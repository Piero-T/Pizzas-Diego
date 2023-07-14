<div class="my-orders">

   <section>

      <div id="close-orders"><span>Cerrar</span></div>

      <h3 class="title"> Mis Pedidos </h3>

      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){   
      ?>
      <div class="box">
         <p> Fecha y Hora : <span><?= $fetch_orders['placed_on']; ?></span> </p>
         <p> Nombre : <span><?= $fetch_orders['name']; ?></span> </p>
         <p> Número : <span><?= $fetch_orders['number']; ?></span> </p>
         <p> Dirección : <span><?= $fetch_orders['address']; ?></span> </p>
         <p> Método de pago : <span><?= $fetch_orders['method']; ?></span> </p>
         <p> Pedidos totales : <span><?= $fetch_orders['total_products']; ?></span> </p>
         <p> Precio Total : <span>S/<?= $fetch_orders['total_price']; ?></span> </p>
         <p> Estado : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Aún no ha realizado pedido</p>';
      }
      ?>

   </section>

</div>