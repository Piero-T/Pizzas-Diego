<div class="user-register">

<section>

   <div id="close-register"><span>Cerrar</span></div>

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

   
   
   <div class="flex">
      <form action="" method="post">
         <h3>Regístrate</h3>
         <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" required class="box" placeholder="Ingresa tu nombre" maxlength="20">
         <input type="email" name="email" required class="box" placeholder="Ingresa tu correo" maxlength="50">
         <input type="password" name="pass" required class="box" placeholder="Ingresa una contraseña" maxlength="20" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="cpass" required class="box" placeholder="Confirma la contraseña" maxlength="20" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="Registrarse ahora" name="register" class="register-btn">
      </form>
   </div>
</section>

</div>