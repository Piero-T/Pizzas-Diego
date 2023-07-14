
$(document).ready(function() {
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
});
