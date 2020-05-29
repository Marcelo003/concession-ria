<?php 
// Conexão
    require "db_connect.php";

// Sessão
    session_start();

// Verificação
    if (!isset($_SESSION['logado'])){
        header('Location: index.php');
    }

// Dados 
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($db_connect, $sql);
    $sql2 = "SELECT * FROM cars WHERE user_id = '$user_id'";
    $result2 = mysqli_query($db_connect, $sql2);
    $dados = mysqli_fetch_array($result);
    $carros = mysqli_fetch_array($result2);
    $_SESSION['first_name'] = $dados['first_name'];
    $_SESSION['last_name'] = $dados['last_name'];
    $first_name = $dados['first_name'];
    $last_name = $dados['last_name'];

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .carros{
            width: 25%;
            height: 100%;
            color: white;
            background-color:rgb(83, 82, 82);
            padding:2%;
            border-radius:30px;
            box-sizing:border-box;
            border-style:solid;
        }
        h3{
            text-align:center;
        }
        h2{
            text-align:center;
        }
    </style>
</head>
<body>
    <h1><center>Meus Veículos</center></h1><hr><p></p>
    <a href="addcar.php">Adicionar veículo</a><p></p>

    <?php
        if(mysqli_num_rows($result2) > 0){
            while($row = mysqli_fetch_assoc($result2)){
                $car_id = $carros['car_id'];
                $chassi = $carros['chassi'];
                $placa = $carros['placa'];
                $renavam = $carros['renavam'];
                $marca = $carros['marca'];
                $modelo = $carros['modelo'];
                $procedencia = $carros['procedencia'];
                $data_compra = $carros['data_de_compra'];
                $ipva = $carros['ipva'];
                $dpvat = $carros['dpvat'];
                $multa = $carros['multa'];
                $valor_compra = $carros['valor_compra'];?>

                <a href="http://localhost/MaRCELO/car.php">
                    <div class="carros">
                        <?php
                            echo "<br><h2>Modelo: " . ucfirst($modelo) . "</h2>";
                            echo "<br><h3>Placa: $placa<h3>";   
                        ?>
                    </div>
                </a>
                <?php
            }
        }

    ?>
    <a href="home.php">Voltar<a>
</body>
</html>