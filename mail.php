<?php
require_once "conexion.php"; //estableces conexión
$direccionMail=$_POST['direccion']; //recoges la variable que el usuario ha ingresado como dirección
$sql="SELECT `nombre`,`id`,`email` FROM `usuarios` WHERE `email`='$direccionMail' COLLATE utf8_bin"; //selecciones la id, el correo, la contraseña y el tipo de la base de datos usuarios mientras que encuente un correo electrónico acorde con el que va antes y COLLATE utf8_bin es para que reconozca mayúsculas de minúsculas
$resultado=mysqli_query($conexion,$sql);

$estado=''; //declaras una variable error

if(mysqli_num_rows($resultado)>0) //si encuentra alguna columna (es decir el correo está bien)
{
    $fila=mysqli_fetch_assoc($resultado); //creas como arrays asociativos
    //mail(to,subject,message,headers,parameters)
    $id=$fila['id'];
    $cabeceras='MIME-Version: 1.0' . "\r\n";
    $cabeceras.='Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras.='De: Mi Kultisens. Margarita S.L.';
    $message= '
    <html>
    <head>
    <title>Registro</title>
    </head>
    <body>
    <h2>Hola '.$fila['nombre'].'
    </h2>
    <p>Para poder cambiar la contraseña haga click <a href="localhost/cambiarClave.php?id='.$id.'">aquí.</a>
    </p>
    <p>KULTISENS. Margarita S.L.</p>
    </body>
    </html>
    ';
    //las cabeceras son muy importantes porque sino no cogería el html, lo mostraría como texto puro
    mail($direccionMail,'Cambiar contraseña',$message,$cabeceras);
    $estado="enviado";
    header('Location:recuperarClave.php?estado=');
}
else //si no cuadra el correo muestra otro mensage de error y le redirige otra vez al login
{
    $error='error';
    header('Location:recuperarClave.php?estado='.$error);
}
?> <!--llamo a la base de datos y guardo únicamente el correo y la contraseña-->