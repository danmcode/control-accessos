<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovery Password</title>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <style>
        body {
            font-family: "Nunito", sans-serif;
            font-size: 18px;
        }

        .greeting{
            margin-top: 12px;
            font-size: 20px;
            font-weight: bolder;
        }

        .company-lbl{
            font-weight: bolder;
        }

        .content {
            margin-left: 10%;
            margin-right: 10%;
            background-color: #f8fafc;
        }

        .nav-bar {
            height: 60px;
            background-color: white;
        }

        .nav-icon {
            padding: 10px;
            font-size: 22px;
            font-weight: bold;
            margin-right: 25px;
            position: relative;
        }

        .nav-icon img {
            width: 50px;
            margin-right: 12px;
        }

        .nav-icon a {
            text-decoration: none;
            color: #012970;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .password-field {
            align-items: center;
            background-color: #D6DBDF;
            display: flex;
            font-family: monospace;
            font-size: 20px;
            color: #2C3E50;
            font-weight: bolder;
            height: 60px;
            justify-content: center;
            margin-left: 15%;
            margin-right: 15%;
            text-decoration: none;
            border-radius: 10px;
        }
        .go-login{
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .go-login a{
            color: white;
            text-decoration: none;
            background-color: #012970;
            width: fit-content;
            padding: 10px;
            border-radius: 10px;
        }

        .go-login a:hover{
            background-color: #0d3985;
        }   

        .remember-change{
            background-color: #fff3cd;
            padding: 10px;
            color: #664d03;
            font-weight: bolder;
            height: 50px;
            display: flex;
            align-items: center;
        }

        footer{
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #012970;
            color: white;
            height: 80px;
        }

        footer a{
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>

<body>
    <div class="content">
        <nav class="nav-bar">
            <div class="nav-icon">
                <a href="#">
                    <img src="{{ asset('images/pisa.png') }}">
                    <span> Protecnica Ingenieria </span>
                </a>
            </div>
        </nav>

        <main>
            <span class="greeting">
                Hola, {{ $name }}
            </span>

            <p>
                Has sido registrado como colaborador en la empresa: <span class="company-lbl"> {{ __('Protecnica Ingenieria') }} </span> en el aplicativo de
                control de visitantes, desde el cual podrás realizar las siguientes acciones:

                <ul>
                    <li> Realizar solicitudes de permisos </li>
                    <li> Autorizaciones de salida de equipos </li>
                    <li> Control de ingresos y salidas de visitantes </li>
                </ul>
            </p>

            <p>
                Este es tu usuario para iniciar sesión:
            </p>

            <div class="password-field">
                <span> {{ $username }} </span>
            </div>

            <p> 
                Y esta es tu contraseña temporal para ingresar al aplicativo:
            </p>
            
            <div class="password-field">
                <span> {{ $password }} </span>
            </div>

            <p class="remember-change"> ¡Recuerda cambiar tu contraseña en el primer inicio de sesión! </p>

            <div class="go-login">
                <a href=""> Ir al aplicativo </a>
            </div>


        </main>

        <footer>

            <div>
                <span>&copy; {{ __('Protecnica Ingenieria') }} - {{ date('Y') }}</span>
                <a href="#"> Tratamiento de datos personales </a>
            </div>

        </footer>
    </div>
</body>

</html>