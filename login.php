<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equip="x-ua-compatible" content="ie-edge">
    <title>login</title>
    <script type="text/javascript" src="js/ojo.js"> </script>
    <!--añades una función javascript externa-->
   <link rel=stylesheet type="text/css" href="css/estilo.css">
</head>

<body>
<section class="todo">
   <header>
       <h1>Iniciar Sesión:</h1>  
   </header>
   <img src="images/img01.jpg" alt="imagen del producto" class="imagen">
    
    <div>
        <?php
        if(isset($_GET["error"])) //miras si existe un mensaje de error
        {
        $hayError=$_GET["error"]; //guardas el mensaje en una variable
        if($hayError=='correoIncorrecto')
            {
            echo"<div style='color:black;
            margin: 5px 0px;
            width: auto; 
            height: auto; 
            display: flex;
            justify-content: center;
            align-items: center; 
            background-color: rgba(255, 0, 0, 0.53); 
            border: darkred 1px solid;
            border-radius: 6px;' >El correo electrónico introducido no es válido.</div>";
        } else {
            echo"<div style='color:black;
            margin: 5px 0px;
            width: auto; 
            height: auto; 
            display: flex;
            justify-content: center;
            align-items: center; 
            background-color: rgba(255, 0, 0, 0.53); 
            border: darkred 1px solid;
            border-radius: 6px;'>La contraseña introducida no es valida.</div>";
            }
        } 
        if(isset($_GET["estado"]))
        {
            echo"<div style='color:black;
            margin: 5px 0px;
            width: auto; 
            height: autp; 
            display: flex;
            justify-content: center;
            align-items: center; 
            background-color: rgba(255, 147, 0, 0.53); 
            border: #ff9300 1px solid;
            border-radius: 6px;' >Su contraseña ha sido cambiada con éxito; ya puede iniciar sesión.</div>";
        }
        ?>
    </div>
    
    <form action="comprobarLogin.php" id="bloque-login" method="post">
        <div class="contenedor-correo">
            <input type="email" placeholder="Correo Electrónico" name="direccion" required id="correoE">
        </div>
        <div class="contenedor-clave">
            <input id="psw" type="password" placeholder="Contraseña" name="psw" required>
            <img id="eye" src="images/iconfinder_icon-21-eye-hidden_314858.svg" onclick="mostrarLogin()">
            <!--esto es lo que hace que aparezca el ojo, llama a la función externa en js-->
        </div>
        <div>
            <a type="button" class="boton_volver" href="index.html">Volver</a>
            <input type="submit" value="Entrar" class="boton_intro">
        </div>
    </form>
    
        <div class="recuperar-contrasenya">
            <a href="recuperarClave.php">Recuperar contraseña</a>
        </div>
    </section>
</body>

</html>
