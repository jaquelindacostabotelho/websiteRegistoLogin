<?php
# Conexao com BD

# definicao das constantes que permitem a ligacao com a BD
define("host", "localhost");
define("user", "root");
define("psw", "");
define("db", "projeto");

# criacao da variavel para abrir e fechar ligacoes com a BD
$conn=mysqli_connect(host,user,psw,db) or die ("Falha na conexão com a BD");
?>