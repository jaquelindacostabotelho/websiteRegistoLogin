<?php

//Conexao
require_once 'conexao.php';
//Sessão
session_start();

if(isset($_POST['btn-registar'])){
    #declaracao das variaveis
    #addslashes: adiciona barra invertida (\) antes de ', ", \, e NULL.
    #md5: encriptar a password
    $nome=addslashes($_POST['nome']);
    $username=addslashes($_POST['username']);
    $psw=addslashes(md5($_POST['psw']));
    
    $table="utilizadores";
    $sql="SELECT id FROM $table WHERE username = '$username'";
    $query=mysqli_query($conn, $sql) or die ($sql);
    $total=mysqli_num_rows($query);
    
    #condicao para registrar novo user
    if($total>=1){
        #Nao registra, pois username já existe
        $path="registo.php?usernameRepetido";
    } else {
        #registra
        $sql="INSERT INTO $table VALUES (null,'$nome','$username','$psw')";
        mysqli_query($conn, $sql) or die($sql);
        $path="indexLogin.php?registoSucesso";
    }
    header("Location:$path");        
}

?>