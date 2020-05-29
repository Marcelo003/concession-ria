<?php
//conexão com banco de dados
$host = "localhost";
$user = "root";
$passwd = "";
$db_name = "MTB";

$db_connect = mysqli_connect($host, $user, $passwd, $db_name);

if (mysqli_connect_error()){

    echo "Falha na conexão " . mysqli_connect_error() ;
}

?>