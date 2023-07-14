
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
<section class="about" id="about">

    <h1 class="heading">Sobre Nosotros</h1>
    <div class="box-container-box2">
    <div class="box-container">
        
            <div class="box">
                <img src="../images/puka1.png" alt=""/>
                
                <h3>¿Quienes somos?</h3>
                <p>El minimarket “PUKA” es una tienda de localidad que ofrece productos de primera necesidad. Ofrece los mejores productos en sus mejores precios </p>
            </div>

            <div class="box">
                <img src="../images/mision_puka.png" alt="">
                <h3>Misión</h3>
                <p>Somos una tienda encargada de brindar y ofrecer productos de excelente calidad; a través de un buen servicio, el mejor precio y un trato amable por parte de quienes conformamos esta tienda,</p>
            </div>

            <div class="box">
                <img src="../images/Vision_puka.png" alt="">
                <h3>Visión</h3>
                <p>Buscamos ser la primera opción de nuestros clientes al momento de adquirir insumos para su negocio; permitiéndonos crear relaciones duraderas basadas en la confianza, el respeto y la honestidad.</p>
            </div>
        </div>
    
        <div class="box2">
            <div class="box2-left">
               <img src="../images/puka.jpg" alt=""/>
            </div>
            <div class="blox2-right">
               <h3>Ubicación</h3>
               <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d447.0901595594313!2d-76.98010656932031!3d-12.150268282781449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105b869e1a277a9%3A0x17034295fa9e7f4e!2sLos%20Heroes%20188%20100%2C%20San%20Juan%20de%20Miraflores%2015803!5e0!3m2!1ses-419!2spe!4v1663531088075!5m2!1ses-419!2spe" width="500px" height="320px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
            </div>
            
        </div>
    </div>
        
    

</section>
<script src="../js/script.js"></script>
</body>