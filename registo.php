<?php
//Conexao
require_once 'conexao.php';
//Sessão
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="src/css/styleRegisto.css" rel="stylesheet">
<title>Registo</title>

<!--funcao em JS para mostra a psw-->
<script>
function mostrarPSW(){
document.getElementById("psw").setAttribute("type", "text");
}
function ocultarPSW(){
document.getElementById("psw").setAttribute("type", "password");
}
</script>
</head>

<body>
<?php
//verifica se o username já esxiste na BD
if(isset($_GET['usernameRepetido'])){
    ?>
    <li>Não registado, pois username já existe. Escolha outro USERNAME</li>
    <?php
}
?>
<h1 class="text-center">Registo</h1>

<hr>
<div classe="formulario">
<!--Formulario de registo -->
    <form action="registar.php" method="POST">
    <label><b>Nome:</b></label><br><input type="text" name="nome" placeholder="Enter name" required><br>
    <label><b>Username:</b></label><br><input type="text" name="username" placeholder="Enter username" required><br>
    <label><b>Password:</b></label><br><input id="psw" type="password" name="psw" placeholder="Enter password" required>
    <span onmouseover="mostrarPSW()" onmouseout="ocultarPSW()">Ver password</span><br><br>
    <button type="submit" name="btn-registar">Registar</button><br><br>
    <p>Se possui registo, click <a href="indexLogin.php">aqui</a></p><br>
    </form>
</div>
<hr>
</body>
</html>