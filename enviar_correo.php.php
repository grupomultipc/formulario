<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $comentarios = $_POST['comentarios'];
    
    // Dirección de correo destino
    $to = "grupomultipc3@gmail.com";
    
    // Asunto del correo
    $subject = "Nuevo cliente interesado - " . $nombre;
    
    // Cuerpo del mensaje
    $message = "
    <html>
    <head>
        <title>Nuevo cliente interesado</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            table { border-collapse: collapse; width: 100%; }
            th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
            th { background-color: #f2f2f2; }
        </style>
    </head>
    <body>
        <h2>Información del cliente</h2>
        <table>
            <tr><th>Campo</th><th>Valor</th></tr>
            <tr><td>Nombre</td><td>$nombre</td></tr>
            <tr><td>Fecha</td><td>$fecha</td></tr>
            <tr><td>Producto de interés</td><td>$producto</td></tr>
            <tr><td>Cantidad</td><td>$cantidad</td></tr>
            <tr><td>WhatsApp</td><td>$whatsapp</td></tr>
            <tr><td>Correo electrónico</td><td>$email</td></tr>
            <tr><td>Departamento</td><td>$departamento</td></tr>
            <tr><td>Municipio</td><td>$municipio</td></tr>
            <tr><td>Comentarios</td><td>$comentarios</td></tr>
        </table>
    </body>
    </html>
    ";
    
    // Cabeceras del correo
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Gracias por contactarnos. Su información ha sido enviada correctamente.'); window.location.href = 'formulario_clientes.html';</script>";
    } else {
        echo "<script>alert('Hubo un error al enviar el formulario. Por favor intente nuevamente.'); window.history.back();</script>";
    }
} else {
    header("Location: formulario_clientes.html");
}
?>