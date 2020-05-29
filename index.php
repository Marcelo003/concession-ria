<?php 
// Conexão
     require "db_connect.php";

// Sessão
    session_start();

// Verificar request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $erros = array();
        $login = mysqli_escape_string($db_connect, $_POST['login']);
        $password = mysqli_escape_string($db_connect, $_POST['password']);

        if (empty($login) or empty($password)){
            $erros[] = "<li> O campo login/senha precisa ser preenchido</li>";
        } else {
            $sql1 = "SELECT login FROM users WHERE login = '$login'";
            $result1 = mysqli_query($db_connect, $sql1);

            if (mysqli_num_rows($result1) > 0){
                $password = md5($password);
                $sql = "SELECT * FROM users WHERE login = '$login' AND passwd = '$password'";
                $result = mysqli_query($db_connect, $sql);

                if (mysqli_num_rows($result) == 1){
                    $dados = mysqli_fetch_array($result);
                    mysqli_close($db_connect);
                    $_SESSION['logado'] = true;
                    $_SESSION['user_id'] = $dados['user_id'];

                    header('location: home.php');
                }else {
                    $erros[] = "<li>Usuário ou Senha incorretos</li>";
                }
            }else {
                $erros[] = "<li>Usuário não encontrado</li>";
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
</head>
<body>
    <h1>Login</h1><br>
    <?php
        if (!empty($erros)){
            foreach($erros as $erro){
                echo $erro;
            }
        }
    ?>
    <hr>
    <form name="f1" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        Login: <input type="text" name="login" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['login'];}?>"><p></p>
        Senha: <input type="password" name="password"><p></p>
        <input type="submit" name="enviar" value="Entrar ">
        <input type="reset" name="limpar" value="Limpar"><p></p>

    </form>
    <a href="cadastro.php">Cadastre-se</a>
</body>
</html>
<?php 


