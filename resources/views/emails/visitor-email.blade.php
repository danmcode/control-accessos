<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Notificar visitante </title>
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
            font-size: 20px;
            font-weight: bolder;
        }

        .company-lbl{
            font-weight: bolder;
        }

        .content {
            margin-left: 25%;
            margin-right: 25%;
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
        
        .div-table{
            display: flex;
            justify-content: center;
        }

        .td-title{
            padding-right: 12px;
            text-align: right;
            color: #012970;
            font-weight: bolder;
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
                    <img src="/images/Logo-Pisa.png">
                    <span> Protecnica Ingenieria </span>
                </a>
            </div>
        </nav>

        <main>
            <span class="greeting">
                Hola, {{ Daniel }}
            </span>

            <p>
                Nos permitimos informar <span class="company-lbl"> {{ el ingreso }} </span> de un visitante a las instalaciones:
            </p>
            <div class="div-table">
                <table>
                    <tbody>
                        <tr>
                            <td class="td-title"> Visitante: </td>
                            <td> {{ Daniel Alexander Muelas Rivera }} </td>
                        </tr>
                        <tr>
                            <td class="td-title"> Fecha de ingreso: </td>
                            <td> {{ 23 - Junio - 2023 10:10:01}} </td>
                        </tr>
                        <tr>
                            <td class="td-title"> Fecha de salida: </td>
                            <td> {{ 23 - Junio - 2023 11:10:01 }} </td>
                        </tr>
                        <tr>
                            <td class="td-title"> Ubicación: </td>
                            <td> {{ Edificio antiguo }} </td>
                        </tr>
                        <tr>
                            <td class="td-title"> Registrado por: </td>
                            <td> {{ Jefferson Mesa }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

        <footer>

            <div>
                <span>&copy; {{ Protecnica Ingenieria }} - {{ 2023 }}</span>
                <a href="#"> Tratamiento de datos personales </a>
            </div>

        </footer>
    </div>
</body>

</html>