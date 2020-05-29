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
    $dados = mysqli_fetch_array($result);
    mysqli_close($db_connect);
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
</head>
<body>

    <?php 
        echo "Olá " . $first_name . "<p></p>";

    ?>
    Gerenciar Veículos: <a href="cars.php">Meus carros</a>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>