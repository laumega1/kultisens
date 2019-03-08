<?php
require_once "conexion.php"; //estableces conexión
$direccionMail=$_POST['direccion']; //recoges la variable que el usuario ha ingresado como dirección
$clave=$_POST['psw']; //recoges la variable que ha puesto como contraseña
$sql="SELECT `id`,`email`,`contrasenya`,`tipo` FROM `usuarios` WHERE `email`='$direccionMail' COLLATE utf8_bin"; //selecciones la id, el correo, la contraseña y el tipo de la base de datos usuarios mientras que encuente un correo electrónico acorde con el que va antes y COLLATE utf8_bin es para que reconozca mayúsculas de minúsculas
$resultado=mysqli_query($conexion,$sql);

$error=''; //declaras una variable error

if(mysqli_num_rows($resultado)>0) //si encuentra alguna columna (es decir el correo está bien)
{
    $fila=mysqli_fetch_assoc($resultado); //creas como arrays asociativos
    if($fila['contrasenya']==$clave) //miras si la clave es correcta, si lo es:
    {
        if($fila['tipo']==0) //miras si el tipo es 0 es decir es un cliente y le rediriges a la pagina principal personalizada, por eso le pasas la id
        {
            header('Location:paginaPrincipal.html?id='.$fila['id']);
        }
        else //sino significa que es administrador
        {
            header('Location:administrador.html');
        }
    }
    else //si encuentra correo pero la contraseña no cuadra te envia un mensage de error y lo lleva otra vez al login
    {
        $error='claveIncorrecta';
        header('Location:Login.php?error='.$error);
    }
    
}
else //si no cuadra el correo muestra otro mensage de error y le redirige otra vez al login
{
    $error='correoIncorrecto';
    header('Location:login.php?error='.$error);
}
?> <!--llamo a la base de datos y guardo únicamente el correo y la contraseña-->