<?php 
// Conexão
    require "db_connect.php";
//Processamento de dados
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = mysqli_escape_string($db_connect, $_POST['login']);
        $passwd = mysqli_escape_string($db_connect, $_POST['password']);
        $passwd2 = mysqli_escape_string($db_connect, $_POST['password2']);
        $first_name = mysqli_escape_string($db_connect, $_POST['first_name']);
        $last_name = mysqli_escape_string($db_connect, $_POST['last_name']);

        if(empty($login) or empty($passwd) or empty($first_name) or empty($last_name)){
            $erros[] = "<li>Preencha todos os campos</li>";
        }else{
            $first_name = $first_name;
            $last_name = $last_name;
            $login = $login;
            $passwd = $passwd;
            $sql1 = "SELECT login FROM users WHERE login = '$login'";
            $result1 = mysqli_query($db_connect,$sql1);
            if (mysqli_num_rows($result1) == 1){
                $erros[] = "<li>Login em uso, tente outro</li>";
            }elseif($passwd != $passwd2){
                $erros[] = "<li>As senhas não coencidem</li>";
            }else{
                $sql = "INSERT INTO users VALUES (default, '$login', md5('$passwd'), '$first_name', '$last_name')";
                $result = mysqli_query($db_connect, $sql);
                session_start();
                $sql2 = "SELECT * FROM users WHERE login = '$login' AND passwd = md5('$passwd')";
                $result2 = mysqli_query($db_connect, $sql2);
                if (mysqli_num_rows($result2) == 1){
                    $dados = mysqli_fetch_array($result2);
                    mysqli_close($db_connect);
                    $_SESSION['logado'] = true;
                    $_SESSION['user_id'] = $dados['user_id'];
                    header('Location: home.php');
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Cadastro</h1><br>
    <?php 
        if (!empty($erros)){
            foreach($erros as $erro){
                echo $erro;
            }
        }
    ?>
    <hr>
    <form name="f1" method="POST" action="">
        Nome: <input type="text" name="first_name" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['first_name'];}?>" placeholder="Digite seu Nome" required><p></p>
        Sobrenome: <input type="text" name="last_name" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['last_name'];}?>" placeholder="Digite seu Sobrenome" requried><p></p>
        Login: <input type="text" name="login" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['login'];}?>" placeholder="Digite seu Login" required><p></p>
        Senha: <input type="password" name="password" placeholder="Digite sua Senha" required><p></p>
        Confirme sua senha: <input type="password" name="password2" placeholder="Digite sua Senha" required><p></p>
        <input type="submit" name="enviar">
        <input type="reset" name="limpar" value="Limpar"><p></p>

    </form>
    <a href="index.php">Fazer Login</a>
</body>
</html>
