document.getElementById('messageForm').addEventListener('submit', function(event) {
    
    var message = document.getElementById('message').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'tr_chat_input.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            fetchMessages();
            document.getElementById('message').value = '';
        }
    };
    xhr.send('message=' + encodeURIComponent(message));
});

function fetchMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'tr_chat_output.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            document.getElementById('messages').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

fetchMessages();
