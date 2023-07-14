<!-- header section starts  -->
<?php include_once '../Controllers/maincontroller.php' ?>

<!-- header section ends -->

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
<body>
   <!-- header section starts  -->
   <?php include_once '../Controllers/maincontroller.php' ?>
   <!-- header section ends -->

   <!-- Agrega el icono del chatbot en cualquier parte de la página -->
   <div id="chatbot-icon">
   <i class="fa-solid fa-comments fa-beat fa-2xl" style="color: #000000;"></i>
   </div>

   <?php require 'header.php';  ?>
   <?php require 'slider.php';  ?>
   <?php require 'footer.php';  ?>

   <div id="chatbot-container" class="hide">
   
   <div id="chat-container">
   <hr />
      <div id="chat-input">
         <p>Hola! Escoge una opción para poder ayudarte</p>
         <button class="question-button" data-question="Horario">¿Cual es el horario de atención?</button>
         <button class="question-button" data-question="Ubicacion">¿En donde puedo ubicarlos?</button>
         <button class="question-button" data-question="Opciones de entrega">¿Cuales son sus opciones de entrega?</button>
         <button class="question-button" data-question="Comunicarse con nosotros">Quiero comunicarme con ustedes</button>
      </div>
      <div id="chat-messages">
         <!-- Aquí se mostrarán los mensajes del chat -->
      </div>
   </div>
</div>




   <!-- Incluye los scripts de jQuery y personalizados al final del archivo -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="../js/script.js"></script>
   <script>
      $(document).ready(function() {
         // Al hacer clic en el icono del chatbot, muestra/oculta el contenedor del chatbot
         $('#chatbot-icon').click(function() {
            $('#chatbot-container').toggleClass('show');
            var src = $('#chatbot-container').hasClass('show') ? '../Views/chatbot.php' : '';
            $('#chatbot-frame').attr('src', src);
         });
      });
   </script>
</body>
</html>
