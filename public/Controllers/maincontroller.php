<?php

include '../config.php';
//Inicio Sesion
session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}
;

//Registrarse
if (isset($_POST['register'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `user` WHERE name = ? OR email = ?");
   $select_user->execute([$name, $email]);



   if ($select_user->rowCount() > 0) {
      $message[] = 'Nombre de usuario o correo ya existe.';
   } else
      if ($pass != $cpass) {
         $message[] = 'Las contraseñas no coinciden.';
      } else {
         $insert_user = $conn->prepare("INSERT INTO `user`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'Registrado con éxito. Porfavor, inicie sesión.';
      }
}

//Actualizar Carrito
if (isset($_POST['update_qty'])) {
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = '¡Carrito Actualizado!';
}

//Eliminar pedido del carrito
if (isset($_GET['delete_cart_item'])) {
   $delete_cart_id = $_GET['delete_cart_item'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$delete_cart_id]);
   header('location:/Proyecto_Web_Minimarket/Views/home.php');
}

//Salir de Sesion
if (isset($_GET['logout'])) {
   session_unset();
   session_destroy();
   header('location:/Proyecto_Web_Minimarket/Views/home.php');
}

//Agregar al carrito
if (isset($_POST['add_to_cart'])) {

   if ($user_id == '') {
      $message[] = 'Porfavor, inicie sesión.';
   } else {

      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND name = ?");
      $select_cart->execute([$user_id, $name]);

      if ($select_cart->rowCount() > 0) {
         $message[] = 'Ya fue agregado al carrito.';
      } else {
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = '¡Agregado al carrito con éxito!';
      }

   }

}

//Realizar pedido
if (isset($_POST['order'])) {

   if ($user_id == '') {
      $message[] = 'Porfavor, inicie sesión.';
   } else {
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);
      $address = $_POST['flat'];
      $address = filter_var($address, FILTER_SANITIZE_STRING);
      $reference = $_POST['street'];
      $reference = filter_var($reference, FILTER_SANITIZE_STRING);
      $method = $_POST['method'];
      $method = filter_var($method, FILTER_SANITIZE_STRING);
      $total_price = $_POST['total_price'];
      $total_products = $_POST['total_products'];

      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);

      if ($select_cart->rowCount() > 0) {
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, method, address, reference, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
         $insert_order->execute([$user_id, $name, $number, $method, $address, $reference, $total_products, $total_price]);
         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);
         $message[] = '¡Pedido realizado con éxito!';
      } else {
         $message[] = 'El carrito está vacío.';
      }
   }

}


// Verificar si el usuario ha realizado al menos una orden

$select_orders = $conn->prepare("SELECT o.*, u.email FROM `orders` AS o INNER JOIN `user` AS u ON o.user_id = u.id WHERE o.user_id = ?");
$select_orders->execute([$user_id]);

if ($select_orders->rowCount() > 0) {
   $order = $select_orders->fetch(PDO::FETCH_ASSOC);
   $name = $order['name'];
   $number = $order['number'];
   $address = $order['address'];
   $reference = $order['reference'];
   $email = $order['email'];

} else {

   // Si el usuario no ha realizado ninguna orden, puedes establecer valores predeterminados o mostrar un mensaje indicando que no hay información disponible.
   $name = '';
   $number = '';
   $address = '';
   $reference = '';
   $email = '';
}

//CHATBOT
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userInput'])) {
   // Obtener la pregunta del usuario
   $userInput = $_POST['userInput'];

   // Definir las preguntas y respuestas
   $faq = array(
       'Horario' => 'Nuestro horario de atención es de lunes a domingo de 9am a 6pm.',
       'Ubicacion' => 'Estamos ubicados en Los Heroes 188 100, San Juan de Miraflores 15803',
       'Opciones de entrega' => 'Ofrecemos entrega a domicilio y retiro en tienda.',
       'Comunicarse con nosotros' => 'Puede escribirnos a nuestro WhatsApp: <a href="https://wa.me/931452371">931452371</a>'
   );

   // Verificar la pregunta del usuario y generar la respuesta correspondiente
   $response = '';
   $userInput = strtolower($userInput);

   if (strpos($userInput, 'horario') !== false) {
       $response = $faq['Horario'];
   } elseif (strpos($userInput, 'ubicacion') !== false) {
       $response = $faq['Ubicacion'];
   } elseif (strpos($userInput, 'opciones de entrega') !== false) {
       $response = $faq['Opciones de entrega'];
   } elseif (strpos($userInput, 'comunicarse con nosotros') !== false) {
      $response = $faq['Comunicarse con nosotros'];
   } else {
       $response = 'Lo siento, no puedo responder esa pregunta en este momento.';
   }

   // Retornar la respuesta al cliente
   echo $response;
}


?>



