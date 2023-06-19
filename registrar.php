<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['ApellidoP']) && isset($_POST['ApellidoM']) && isset($_POST['curp']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {
        
        $name = $_POST['name'];
        $ApellidoP = $_POST['ApellidoP'];
        $ApellidoM = $_POST['ApellidoM'];
        $curp = $_POST['curp'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "prueba1";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(name, ApellidoP, ApellidoM, curp, password, email, phone) values(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssssi",$name, $ApellidoP, $ApellidoM, $curp, $password, $email, $phone);
                if ($stmt->execute()) {
                    
                    ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Confirmacion de datos</title>
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
        <h1>Subida Exitosa</h1>
        <p>Tus datos se han subido correctamente.</p>
        <p>Puedes ir a <a href="pagInicioSesion.html">Iniciar Sesion</a>.</p>
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

                else {
                    echo $stmt->error;
                }
            }
            else {
                ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Confirmacion de datos</title>
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
        <h1>Subida Erronea</h1>
        <p>Tus correo electronico ya esta en uso.</p>
        <p>Vuelvelo a intentar con un correo electronico diferente o ponte en contacto con nuestro soporte  <br> <a href="index.html">Volver a registro </a>.</p>
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
            $stmt->close();
            $conn->close();
        }
    }
    else {
        
        ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Confirmacion de datos</title>
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
        <h1>Todos los campos son obligatorios</h1>
        <p>Tus datos no se han subido correctamente.</p>
        <p>Llena todos los campos <br> <a href="index.html">Vuelve a registro</a>.</p>
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
        die();
    }
}
else {
    
    ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Confirmacion de datos</title>
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
        <h1>Subida Fallida</h1>
        <p>Tus datos no se han subido correctamente.</p>
        <p>El boton esta fallando o mal configurado :c vuelva a intentarlo mas tarde o pongase en comunicacion con nosotros <br><a href="index.html">Volver a pagina de registro</a>.</p>
    </div>
    </body>
</html>
<?php
}
?>
