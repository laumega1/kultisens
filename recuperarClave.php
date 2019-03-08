<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equip="x-ua-compatible" content="ie-edge">
    <title>Recuperar Contraseña</title>
    <link rel=stylesheet type="text/css" href="css/estilosClave.css">
</head>
<body>
   <header> <!--ponemos el boton de refrescar y el h1-->
        <img class="refresh" src="images/refresh.svg" onclick="location.href='recuperarClave.php'" alt="Refrescar Página">
        <h1>¿Ha olvidado su contraseña? </h1>
    </header>
    
    <section> 
        <article>
            <p>Si ha perdido u olvidado su contraseña; introduzca su correo electrónico y le enviaremos un enlace para cambiarla.</p>  
        </article>
        
        <div>
        <?php 
        //mesnages de error por si no se encuentra el correo electrónico en la BD o para avisar de que se le ha enviado el correo correctamente
        if(isset($_GET["estado"]))
        {
            if($_GET["estado"]=='error')
            {
            echo"<div style='color:black;
            margin: 5px 16px;
            width: auto; 
            height: auto; 
            display: align-flex;
            justify-content: center;
            align-items: center; 
            background-color: rgba(255, 0, 0, 0.53); 
            border: darkred 1px solid;
            border-radius: 6px;' >El correo electrónico no es valido. Porfavor, vuelva a intentarlo o <a href='contactar.php'> contáctenos.</a></div>";  
            }
            else
            {
            echo"<div style='color:black;
            margin: 5px 16px;
            width: auto; 
            height: auto; 
            display: align-flex;
            justify-content: center;
            align-items: center; 
            background-color: rgba(255, 147, 0, 0.53); 
            border: #ff9300 1px solid;
            border-radius: 6px;' >Su correo electrónico ha sido enviado con éxito.</div>";
            }
        }
        ?>
        </div>
        <!--formulario-->
        <form action="mail.php" id="bloque-recuperar" method="post">
            <div class="contenedor-recuperar">
                <img class="mail" src="images/iconfinder_008_Mail_183573.svg">
                <input size="30" class="texto" type="email" placeholder="Correo Electrónico" name="direccion" required>
            </div>
            <div class="botones">
               <a type="button" class="volver-login" href="login.php">Volver</a>
                <input type="submit" value="Enviar Correo" class="boton-enviar">
            </div>
        </form>
    </section>
</body>
</html>
