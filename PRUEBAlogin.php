<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbname = 'prueba1';

// Obtener los valores del formulario de inicio de sesión
$email = $_POST['email'];
$password = $_POST['password'];

// Conectarse a la base de datos
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Verificar si la conexión tuvo éxito
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consultar la base de datos para validar el correo electrónico y la contraseña
$sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $ApellidoP = $row["ApellidoP"];
    $ApellidoM = $row["ApellidoM"];
    $curp = $row["curp"];
    $email = $row["email"];
    $phone = $row["phone"];
    $habilitado = $row["habilitado"];
    if($habilitado == 1){
$solicitud = "aceptado";
    }else{
        $solicitud = "rechazado";
    }
    // Continúa obteniendo los demás campos de usuario según tu estructura de base de datos
?>
<!DOCTYPE html>
<html>
<head>
    <title>Datos del Usuario</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            justify-content: space-between;
            height: 60vh;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        footer {
            position: flex;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px; /* Altura del footer */
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #8b0000;
            text-align: center;
        }

        p {
            color: black;
            margin-bottom: 10px;
            text-align: center;
            
        }
        .container {
            border: 5px solid #8b0000;
            width: 500px;
            border-radius: 10px;
            padding: 20px;
            animation: border-animation 5s infinite;
            padding-bottom: 10px; /* Altura del footer */
        }

        @keyframes border-animation {
            0% {
                border-color: #8b0000;
            }
            25% {
                border-color: #ff0000;
            }
            50% {
                border-color: #800000;
            }
            75% {
                border-color: #b71c1c;
            }
            100% {
                border-color: #8b0000;
            }
        }
        .container2 {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .container3 {
            max-width: 460px;
            margin: 0 auto;
            padding: 40px;
            border: 5px solid;
            font-size: 14px; /* Modifica el tamaño de letra a 24 píxeles */
            font-family: Arial, sans-serif; /* Modifica el tipo de letra a Arial o una fuente sans-serif */
            animation: border-animation 5s infinite;
            text-align: center;
            margin-top: 10px;
            border-radius: 10px;
  
}
    </style>
</head>
<body>
    <div class="container">
    <h1>Datos del Usuario</h1>
    <p>Nombre: <?php echo $name; ?></p>
    <p>Apellidos: <?php echo $ApellidoP; echo $ApellidoM ?></p>
    <p>Curp: <?php echo $curp; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Celular: <?php echo $phone; ?></p>
    <p>Solicitud: <?php echo $solicitud; ?></p>

    <div class="container2" style="background-color:#f1f1f1">
        <br><br>
        <a href="pagInicioSesion.html" class="en">Cerrar sesion</a>
    </div>
    <!-- Continúa con las etiquetas HTML y los campos de usuario restantes -->
    </div>
    <footer>
    <div class="container3" style="background-color:#f1f1f1">
        Contactanos: 
        <a href="tel:5566778899">5566778899</a> <br> Facebook:
        <a href="https://www.facebook.com/upiitaipnoficial/">https://www.facebook.com/upiitaipnoficial/</a>  
    </div>
</footer>
    
</body>
</html>
<?php
} else {
    ?>
    <!DOCTYPE html>
<html>
    <head>
    <title>Error de inicio de sesion</title>
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
        <h1>Error al ingresar los datos</h1>
        <p>Verifique sus datos y vuelva a intentarlo.</p>
        <p>Volver a  <a href="pagInicioSesion.html">Iniciar Sesion</a>.</p>
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

// Cerrar la conexión a la base de datos
$conn->close();
?>