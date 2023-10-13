$(document).ready(function() {
  var chatBody = $('#chat-body');
  var userInput = $('#user-input');
  var sendBtn = $('#send-btn');
  var apiUrl = 'https://api.openai.com/v1/chat/completions';

  function addChatMessage(message, isUser) {
    var className = isUser ? 'user-message' : 'ai-message';
    var messageElement = $('<div>').addClass(className).text(message);
    chatBody.append(messageElement);
    chatBody.scrollTop(chatBody[0].scrollHeight);
  }

  function sendUserMessage() {
    var userMessage = userInput.val();
    if (userMessage.trim() === '') {
      return;
    }

    addChatMessage(userMessage, true);
    userInput.val('');
    
    // Send user message to ChatGPT API
    $.ajax({
      url: apiUrl,
      type: 'POST',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer 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'); // Replace with your actual API key
      },
      data: {
        prompt: userMessage,
        max_tokens: 50
      },
      success: function(response) {
        var aiMessage = response.choices[0].text.trim();
        addChatMessage(aiMessage, false);
      },
      error: function() {
        addChatMessage('Sorry, something went wrong.', false);
      }
    });
  }

  // Send user message when the send button is clicked
  sendBtn.on('click', function() {
    sendUserMessage();
  });

  // Send user message when Enter key is pressed
  userInput.on('keydown', function(event) {
    if (event.keyCode === 13) {
      sendUserMessage();
    }
  });
});
