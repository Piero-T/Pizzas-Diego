<div class="user-account">

<section>

   <div id="close-account"><span>Cerrar</span></div>

   <div class="user">
      <?php
         $select_user = $conn->prepare("SELECT * FROM `user` WHERE id = ?");
         $select_user->execute([$user_id]);
         if($select_user->rowCount() > 0){
            while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){
               echo '<p>¡Bievenido! <span>'.$fetch_user['name'].'</span></p>';
               echo '<a href="/Proyecto_Web_Minimarket/Views/home.php?logout" class="btn">Cerrar Sesión</a>';
            }
         }else{
            echo '<p><span>Usted no ha iniciado sesión aún.</span></p>';
         }
      ?>
   </div>

   <div class="display-orders">
      <?php
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               echo '<p>'.$fetch_cart['name'].' <span>('.$fetch_cart['price'].' x '.$fetch_cart['quantity'].')</span></p>';
            }
         }else{
            echo '<p><span>El carrito está vacío.</span></p>';
         }
      ?>
   </div>
   
   <div class="flex">

      <form action="../Models/user_login.php" method="post">
         <h3>Iniciar sesión </h3>
         <input type="email" name="email" required class="box" placeholder="Ingresa tu correo" maxlength="50">
         <input type="password" name="pass" required class="box" placeholder="Ingresa tu contraseña" maxlength="20">
         <input type="submit" value="Inicia Ahora" name="login" class="btn">
         <button onclick="location.href='/Proyecto_Web_Minimarket/Web_Admin/admin_login.php'" class="admin-btn">Iniciar como Administrador</button>
      </form>

   </div>
</section>

</div>