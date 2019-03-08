<?php
require_once('conexion.php'); /*estableces conexión*/
/*guardas las variables que recibes*/
$clave=$_POST['clave'];
$claveRepetida=$_POST['repetirClave'];
$id=$_POST['id'];
    
$error=''; //declaras una variable error    
    
if($_POST['clave']==$_POST['repetirClave']) /*miras si las contraseñas son iguales*/
{
    $sql = 'UPDATE `usuarios` SET 
        `contrasenya` = "'.$_POST['clave'].'"
    WHERE id = '.$id;
    echo $sql; /*cambias la contraseña*/
    
    
}
else /*si no, vuelves a la página anterior con un mensage de error*/
{
    $error="clavesDistintas";
    header('Location:cambiarClave.php?id='.$id.'&error='.$error);
}

$resultado=mysqli_query($conexion,$sql); /*lo subes a la BD*/

if($resultado)  /*cuando lo hagas creas un estado ok que mostrara en el login un mensage avisando al usuario que su contraseña a sido canviada correctamente*/
{
    $estado="ok";
    header('Location:login.php?estado='.$estado);
}
?>