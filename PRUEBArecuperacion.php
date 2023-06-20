<!--
-Bravo Amescua Emiliano: Comparación de datos datos para la recuperación de contraseña
-->

<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbname = 'prueba1';

// Obtener los valores del formulario de recuperación de contraseña
$curp = $_POST['curp'];
$email = $_POST['email'];

// Conectarse a la base de datos
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Verificar si la conexión tuvo éxito
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consultar la base de datos para verificar el CURP y el nombre del usuario
$sql = "SELECT * FROM register WHERE curp = '$curp' AND email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Usuario encontrado, obtén la contraseña
    $row = $result->fetch_assoc();
    $password = $row['password'];

    // Muestra la contraseña al usuario
    ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Recuperacon de contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            border: 2px solid #800000;
        }

        h1 {
            color: #800000;
        }

        p {
            color: #333333;
        }
        
        a {
            color: #800000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container2 {
    max-width: auto;
    margin: 0 auto;
    padding: 40px;
    border: 5px solid;
    font-size: 14px; /* Modifica el tamaño de letra a 24 píxeles */
    font-family: Arial, sans-serif; /* Modifica el tipo de letra a Arial o una fuente sans-serif */
    animation: border-color-animation 3s infinite alternate;
    text-align: center;
    
  }
  @keyframes border-color-animation {
    0% {
      border-color: #ff9ec2;
    }
    50% {
      border-color: #a43f65;
    }
    100% {
      border-color: #691933;
    }
  } 
    </style>
    </head>
    <body>
    <div class="container">
        <h1>Recuperacion correcta</h1>
        <p>Tu contrasena es: <?php echo $password; ?></p>
        <p>Puedes continuar en <a href="pagInicioSesion.html">Iniciar Sesion</a>.</p>
    </div>
    </body>
    <footer>
        <div class="container2" style="background-color:#f1f1f1">
            Contactanos: 
            <a href="tel:5566778899">5566778899</a> <br> Facebook:
            <a href="https://www.facebook.com/upiitaipnoficial/">https://www.facebook.com/upiitaipnoficial/</a>  
        </div>
    </footer>
</html>
    <?php
} else {
    // Usuario no encontrado
    ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Recuperacon de contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            border: 2px solid #800000;
        }

        h1 {
            color: #800000;
        }

        p {
            color: #333333;
        }
        
        a {
            color: #800000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container2 {
    max-width: auto;
    margin: 0 auto;
    padding: 40px;
    border: 5px solid;
    font-size: 14px; /* Modifica el tamaño de letra a 24 píxeles */
    font-family: Arial, sans-serif; /* Modifica el tipo de letra a Arial o una fuente sans-serif */
    animation: border-color-animation 3s infinite alternate;
    text-align: center;
    
  }
  @keyframes border-color-animation {
    0% {
      border-color: #ff9ec2;
    }
    50% {
      border-color: #a43f65;
    }
    100% {
      border-color: #691933;
    }
  } 
    </style>
    </head>
    <body>
    <div class="container">
        <h1>Recuperacion incorrecta</h1>
        <p>No se encontro el usuario o los datos son erroneos</p>
        <p>Puedes volverlo a intentar en <a href="pagRecordarPass.html">Recuperar contrasena</a> o contactanos si el error continua.</p>
    </div>
    </body>
    <footer>
        <div class="container2" style="background-color:#f1f1f1">
            Contactanos: 
            <a href="tel:5566778899">5566778899</a> <br> Facebook:
            <a href="https://www.facebook.com/upiitaipnoficial/">https://www.facebook.com/upiitaipnoficial/</a>  
        </div>
    </footer>
</html>
    <?php
}

$conn->close();
?>