<?php
include '../config.php';

session_start();

if (isset($_POST['login'])) {
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_user->execute([$name, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if ($select_user->rowCount() > 0) {
      $_SESSION['admin_id'] = $row['id'];
      $userType = $row['type'];
      
      if ($userType === 'admin') {
         header('location: admin_page.php');
         exit();
      } elseif ($userType === 'empleado') {
         header('location: empleado_page.php');
         exit();
      }
   } else {
      $message[] = 'Nombre de usuario o contraseña incorrecta.';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Diego´s Pizza Admin</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom admin style link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>



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

<section class="form-container">

   <form action="" method="post">
      <h3>Iniciar Sesión Admin</h3>
      <input type="text" name="name" required placeholder="Ingresa tu nombre de usuario" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Ingresa tu contraseña" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Inicia Ahora" class="btn" name="login">
      <button onclick="location.href='/Proyecto_Web_Minimarket/Views/home.php'" class="option-btn">Ir a página clientes</button>
   </form>

</section>
   
</body>
</html>