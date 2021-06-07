<?php
/*
function novaConexao($banco = '801')
{
    $servidor='127.0.0.1';
    $usuario='root';
    $senha='';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error)
    {
        die('Erro: '. $conexao->connect_error);
        
    }

    return $conn;
}
*/
$bdServidor='127.0.0.1';
$bdUsuario='root';
$bdSenha='root';
$bdBanco='801';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
        }
