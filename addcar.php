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
    $_SESSION['first_name'] = $dados['first_name'];
    $_SESSION['last_name'] = $dados['last_name'];
    $first_name = $dados['first_name'];
    $last_name = $dados['last_name'];

//Processamento de dados
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_id = mysqli_escape_string($db_connect, $_SESSION['user_id']);
        $chassi = mysqli_escape_string($db_connect, $_POST['chassi']);
        $placa = mysqli_escape_string($db_connect, $_POST['placa']);
        $renavam = mysqli_escape_string($db_connect, $_POST['renavam']);
        $marca = mysqli_escape_string($db_connect, $_POST['marca']);
        $modelo = mysqli_escape_string($db_connect, $_POST['modelo']);
        $procedencia = mysqli_escape_string($db_connect, $_POST['procedencia']);
        $ano_modelo =mysqli_escape_string($db_connect, $_POST['anomodelo']);
        $data_compra = mysqli_escape_string($db_connect, $_POST['datacompra']);
        $ipva = mysqli_escape_string($db_connect, $_POST['ipva']);
        $dpvat = mysqli_escape_string($db_connect, $_POST['dpvat']);
        $multa = mysqli_escape_string($db_connect, $_POST['multa']);
        $valor_compra = mysqli_escape_string($db_connect, $_POST['valorcompra']);
        $comentario = mysqli_escape_string($db_connect, $_POST['comentario']);
        $erros = array();

        if (empty($chassi) or empty($placa) or empty($renavam) or empty($marca) or empty($modelo) or empty($procedencia) or empty($ano_modelo) or empty($data_compra) or empty($ipva) or empty($dpvat) or empty($multa) or empty($valor_compra)){
            $erros[] = "<li>Preencha todos os campos</li>";
        }elseif(empty($erros)){
            $sql3 = "INSERT INTO `cars` (`car_id`, `user_id`, `chassi`, `placa`, `renavam`, `marca`, `modelo`, `procedencia`, `data_de_compra`, `ipva`, `dpvat`, `multa`, `valor_compra`) VALUES (NULL, '$user_id', '$chassi', '$placa', '$renavam', '$marca', '$modelo', '$procedencia', '$data_compra', '$ipva', '$dpvat', '$multa', '$valor_compra');";
            $result3 = mysqli_query($db_connect, $sql3);
            header('Location: cars.php');
            
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
    <script src="js/script.js"></script>
</head>
<body>
    
    <h1><center>Adicionar veículo</center></h1>
    <?php 
        if (!empty($erros)){
            foreach($erros as $erro){
                echo $erro;
            }
        }
    ?>
    <hr>
    <form name="f1" method="POST" action="">
    Chassi: <input type="text" name="chassi" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['chassi'];}?>" placeholder="Digite o Chassi" maxlength="17" required><p></p>
    Placa: <input type="text" name="placa" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['placa'];}?>" placeholder="Digite a Placa" maxlength="8" required><p></p>
    Renavam: <input type="text" name="renavam" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['renavam'];}?>" placeholder="Digite o Renavam" maxlength="11" required><p></p>
    Marca: 
    <select name="marca" onchange="funcmodelo()" required>
        <option value=""></option>
        <option value="audi">Audi</option>
        <option value="bentley">Bentley</option>
        <option value="bmw">BMW</option>
        <option value="caoaChery">CAOA Chery</option>
        <option value="chevrolet">Chevrolet</option>
        <option value="citroen">Citroën</option>
        <option value="dodge">Dodge</option>
        <option value="fiat">Fiat</option>
        <option value="ford">Ford</option>
        <option value="honda">Honda</option>
        <option value="hyundai">Hyundai</option>
        <option value="jac">JAC</option>
        <option value="jeep">Jeep</option>
        <option value="kia">Kia</option>
        <option value="landrover">Land Rover</option>
        <option value="mercedesbenz">Mercedes-Benz</option>
        <option value="mitsubishi">Mitsubishi</option>
        <option value="nissan">Nissan</option>
        <option value="peugeot">Peugeot</option>
        <option value="renault">Renault</option>
        <option value="suzuki">Suzuki</option>
        <option value="toyota">Toyota</option>
        <option value="volkswagen">Volkswagen</option>
    </select>
    Modelo: 
    <select name="modelo" required>

    </select><p></p>
    Procedência:
    <select name="procedencia" required>
        <option value=""></option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option> 
    </select><p></p>
    Ano do Modelo: <input type="number" name="anomodelo" min="1700" max="9999" list="defaultNumbers" required><p></p>
    <datalist id="defaultNumbers">
        <option value="2020">
        <option value="2019">
        <option value="2018">
        <option value="2017">
        <option value="2016">
        <option value="2015">
    </datalist>
    Data de Compra: <input type="date" name="datacompra" required><p></p>
    IPVA: <input type="text" name="ipva"  value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['ipva'];}?>" placeholder="Digite o IPVA" required><p></p>
    DPVAT: <input type="text" name="dpvat" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['dpvat'];}?>" placeholder="Digite o DPVAT" required><p></p>
    Valor em Multas: <input type="text" name="multa" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['multa'];}?>" placeholder="Digite o Valor em Multas" required><p></p>
    Valor da compra: <input type="text" name="valorcompra" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST"){echo $_POST['valorcompra'];}?>" placeholder="Digite o Valor da Compra" required><p></p>
    Adicione um Comentário:<div class="opcional">(opcional)<div><br>
    <textarea name="comentario" rows="10" cols="50" maxlength="255">
    </textarea><p></p>
    <input type="submit" name="enviar" value="Adicionar">
    <input type="reset" name="limpar" value="Limpar"><p></p>
    </form>
    <a href="home.php">Voltar</a>
</body>
</html>