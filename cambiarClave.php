<?php
require_once('conexion.php');
$idCliente=$_GET['id'];
$sql="SELECT `id`,`email` FROM `usuarios` WHERE `id`='$idCliente' COLLATE utf8_bin";
$resultado = mysqli_query($conexion, $sql);
?><!--hasta aqúi lo que haces es guardar variables y haces la consulta sql-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equip="x-ua-compatible" content="ie-edge">
    <title>Cambiar Contraseña</title>
    <script type="text/javascript" src="js/ojo.js"> </script> <!--añades una función javascript externa-->
    <link rel=stylesheet type="text/css" href="css/estilosClave.css"> <!--añades una función externa css-->
</head>
<body>
    <header>
        <h1>Cambiar contraseña:</h1>
    </header>
    
    <section>
    <p>Porfavor; introduzca su nueva contraseña:</p>
    <div>
        <?php
        if(isset($_GET["error"]))
        {
            echo"<div style='color:black;
            margin: 5px 16px;
            width: auto; 
            height: auto; 
            display: align-flex;
            justify-content: center;
            align-items: center; 
            background-color: rgba(255, 0, 0, 0.53); 
            border: #8b0000 1px solid;
            border-radius: 6px;' >Las dos contraseñas introducidas no coinciden.</div>";
        }
        ?> <!--mostramos un error en caso de que las dos contraseñas sean iguales-->
    </div>
    
    <?php
    if(mysqli_num_rows($resultado) > 0) 
    {
        $fila = mysqli_fetch_assoc($resultado);
    ?> <!--miras si existe la variable y creas fila para poder acceder a cada elemento-->
        
    <form action="guardarClave.php" method="post">
    <input type="hidden" name="id" value="<?php echo $idCliente;?>"> <!--con esto le envias la id, hidden es que no se ve-->
        <div class="contenedor-recuperar">
            <img class="mail" src="images/iconfinder_008_Mail_183573.svg">
            <input class="no-modificable" size="30" type="text" placeholder="Correo electrónico" value="<?php echo $fila['email'];?>" readonly><!--insertamos automáticamente en el correo electrónico-->
        </div>
        <div class="clave1">
            <img class="mail" src="images/password.svg">
            <input size="25" id="psw1" name="clave" type="password" placeholder="Contraseña" required>
            <img id="eye1" src="images/iconfinder_icon-21-eye-hidden_314858.svg" onclick="mostrarClave1()" required> <!--esto es lo que hace que aparezca el ojo, llama a la función externa en js-->
        </div>
        <div class="clave2">
           <img class="mail" src="images/password.svg">
            <input size="25" id="psw2" name="repetirClave" type="password" placeholder="Volver a escribir la contraseña" required>
            <img id="eye2" src="images/iconfinder_icon-21-eye-hidden_314858.svg" onclick="mostrarClave2()" required> <!--esto es lo que hace que aparezca el ojo, llama a la función externa en js-->
        </div>
        <div class="botones">
            <a type="button" class="volver-login" href="login.php">Cancelar</a>
            <input class="boton-enviar" type="submit" value="Cambiar Datos">
        </div> 
    </form>      
    <?php
    }
    else 
    {
        echo "No se encontró el usuario";
    }
    ?>
    </section>
</body>
</html>