<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8' />
    </head>
    <body>	
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">
            $(document).ready(function () {
                //Crea un nuevo objeto webSocket.
                var wsUri = "ws://localhost:8000";
                websocket = new WebSocket(wsUri);

                websocket.onopen = function (ev) { // Conexion abierta
                    //convierte y envia los datos al servidor
                    websocket.send('conectando');
                    $('#message_box').append("<div class=\"system_msg\">Connected!</div>"); //notifica a usuario
                }

                //#### Mensaje recibido desde el servidor?
                websocket.onmessage = function (ev) {
                    $('#message').val(ev.data); //reset text
                };

                websocket.onerror = function (ev) {
                    $('#message_box').append("<div class=\"system_error\">Error Occurred - " + ev.data + "</div>");
                };
                websocket.onclose = function (ev) {
                    $('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");
                };
            });
        </script>
        <div class="chat_wrapper">
            <div class="message_box" id="message_box"></div>
        </div>

    </body>
</html>

