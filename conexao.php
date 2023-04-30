<?php
$bdServidor='db';
$bdUsuario='root';
$bdSenha='root';
$bdBanco='801';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno()) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}
