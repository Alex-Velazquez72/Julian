<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: #007BFF;
            text-align: center;
            font-size: 4em;
        }
        p {
            font-size: 1.2em;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            width: 300px;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            font-size: 1em;
            color: #333;
            cursor: pointer;
        }
        
        select:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>
<body>
    <h1>Hello world</h1>
    <p>This is</p>
    <?php
    echo "<p>Today's date is " . date("Y-m-d") . "</p>";
    ?>
    
    <form action="index.php" method="get">
        <label for="nombre" class="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="passw">Contraseña:</label>
        <input type="password" id="passw" name="passw" required>

        <select name="profile" id="profile" required>
            <option value="">Seleccione un perfil</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
            <option value="guess">guess</option>
        </select>
        
        <input type="submit" value="Enviar">
    </form>

    <div class="result">
        <?php
            // Definimos los usuarios válidos para cada perfil
            $usuariosValidos = [
                'admin' => [
                    'username' => 'Jose',
                    'password' => 'Changos'
                ],
                'user' => [
                    'username' => 'Pedro',
                    'password' => '12345'
                ],
                'guess' => [
                    'username' => 'Susy',
                    'password' => '123'
                ]
            ];

            if(isset($_GET['nombre']) && isset($_GET['passw']) && isset($_GET['profile'])){
                $nombre = $_GET['nombre'];
                $passw = $_GET['passw'];
                $profile = $_GET['profile'];
                
                // Verificamos si el perfil seleccionado existe
                if(array_key_exists($profile, $usuariosValidos)) {
                    // Verificamos credenciales
                    if($nombre === $usuariosValidos[$profile]['username'] && 
                       $passw === $usuariosValidos[$profile]['password']) {
                        
                        // Redirección según perfil
                        switch($profile) {
                            case 'admin':
                                header("Location: admin.php");
                                break;
                            case 'user':
                                header("Location: user.php");
                                break;
                            case 'guess':
                                header("Location: guess.php");
                                break;
                        }
                        exit();
                    } else {
                        echo "Usuario o Contraseña Incorrecto para el perfil seleccionado";
                    }
                } else {
                    echo "Por favor seleccione un perfil válido";
                }
            }
        ?>
    </div>
</body>
</html>