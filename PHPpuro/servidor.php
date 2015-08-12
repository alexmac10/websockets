<?php

$host = 'localhost'; //host
$port = '8000'; //port
$null = NULL; //null var
//Crea TCP/IP sream socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

//bind socket para especificar el host
socket_bind($socket, $host, $port);

//Escuchando el puerto
socket_listen($socket, $port);

//agrega socket a la lista
$clients = array($socket);

while (1) {
    $changed = $clients;
    @socket_select($r = array($socket), $w = array($socket), $e = array($socket), 60);
    //valida el socket creado del cliente y realiza la conexion con el mismo
    if (in_array($socket, $changed)) {
        $socket_new = socket_accept($socket);
        $clients[] = $socket_new; //agrega socket al cliente array
        print_r($clients);
        $header = socket_read($socket_new, 1024); //lee datos enviados por el socket
        perform_handshaking($header, $socket_new, $host, $port); //Se establece la conexion con el cliente
        echo "Conexión aceptada!\n\n";
    }
}

// cerrar el socket
socket_close($socket);

//Esta funcion permite establecer correctamente la conexion con el nuevo cliente.
//La finalidad de esta funcion es obtener la Sec-WebSocket-Key que manda el cliente y poder encriptarla
//para responderle al cliente y se extablesca la conexion.
function perform_handshaking($receved_header, $client_conn, $host, $port) {
    //se crea un arreglo para guardar los datos enviados del cliente
    $headers = array();
    //divide el contenido enviado por el cliente en array,por medio de la expresion regular 
    //crea los array apartir el retorno de carro (\r) y salto de linea (\n).
    $lines = preg_split("/\r\n/", $receved_header);

    //recorre el arreglo LINES para meterlo en el arreglo HEADERS
    foreach ($lines as $line) {
        $line = chop($line); //elimina los espacios en blanco
        //Aqui se crea un arreglo matches donde se anexara al arreglo HEADERS donde el indicide de 
        //headers tendra el valor de maches[1] y su valor sera el de matches[2]
        if (preg_match('/\A(\S+): (.*)\z/', $line, $matches)) {
            $headers[$matches[1]] = $matches[2];
        }
    }

    $secKey = $headers['Sec-WebSocket-Key']; // se obtiene el balor de Sec-WebSocket-Key
    //genera el encriptado base64 para responder al cliente
    //sha1 calcula el has del string
    //pack empaqueta el sha1 a una cadena binaria donde H* indica que debe ser todo el texto 
    //en cadena hexadecimal. 
    //base64_encode codifica el paquete binario en base64 
    $secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
    //hand shaking header -- Crea el mensaje para el cliente y se extablesca la conexion
    $upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
            "Upgrade: websocket\r\n" .
            "Connection: Upgrade\r\n" .
            "WebSocket-Origin: $host\r\n" .
            "WebSocket-Location: ws://$host:$port/servidor.php\r\n" .
            "Sec-WebSocket-Accept:$secAccept\r\n\r\n";
    //envia al cliente la respuesta para establecer la comunicacion entre cliente y socket
    socket_write($client_conn, $upgrade, strlen($upgrade));
}
