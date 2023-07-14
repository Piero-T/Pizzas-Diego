let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
}

let account = document.querySelector('.user-account');

document.querySelector('#user-btn').onclick = () =>{
   account.classList.add('active');
}

document.querySelector('#close-account').onclick = () =>{
   account.classList.remove('active');
}

let register = document.querySelector('.user-register');

document.querySelector('#register-btn').onclick = () =>{
   register.classList.add('active');
}

document.querySelector('#close-register').onclick = () =>{
   register.classList.remove('active');
}

let myOrders = document.querySelector('.my-orders');

document.querySelector('#order-btn').onclick = () =>{
   myOrders.classList.add('active');
}

document.querySelector('#close-orders').onclick = () =>{
   myOrders.classList.remove('active');
}

let cart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
   cart.classList.add('active');
}

document.querySelector('#close-cart').onclick = () =>{
   cart.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   account.classList.remove('active');
   register.classList.remove('active');
   myOrders.classList.remove('active');
   cart.classList.remove('active');
};

let slides = document.querySelectorAll('.home-bg .home .slide-container .slide');
let index = 0;

function next(){
   slides[index].classList.remove('active');
   index = (index + 1) % slides.length;
   slides[index].classList.add('active');
}

function prev(){
   slides[index].classList.remove('active');
   index = (index - 1 + slides.length) % slides.length;
   slides[index].classList.add('active');
}

let accordion = document.querySelectorAll('.faq .accordion-container .accordion');

accordion.forEach(acco =>{
   acco.onclick = () =>{
      accordion.forEach(remove => remove.classList.remove('active'));
      acco.classList.add('active');
   }

});
// Al hacer clic en el icono del chatbot, muestra/oculta el contenedor del chatbot
$('#chatbot-icon').click(function() {
   $('#chatbot-container').removeClass('hide');
});


// Al hacer clic en los botones de pregunta, envía la pregunta al chatbot
$('.question-button').click(function() {
   var question = $(this).data('question');
   sendMessage(question);
});

function sendMessage(question) {
   $('#chat-messages').append('<div class="message user-message">' + question + '</div>');

   $.ajax({
      url: '../Controllers/maincontroller.php',
      type: 'POST',
      data: { userInput: question },
      success: function(response) {
         $('#chat-messages').append('<div class="message chatbot-message">' + response + '</div>');
         // Desplazar la ventana de chat hacia abajo para mostrar la última respuesta
         $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
      }
   });
}

// Al hacer clic fuera del contenedor del chatbot, se oculta
$(document).mouseup(function(e) {
   var container = $('#chatbot-container');
   if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.addClass('hide');
   }
});


