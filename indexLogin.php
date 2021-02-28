<?php
#localhost/projeto/jaqueline-botelho/indexLogin.php?username=ana&psw=123&login
//Conexao
require_once 'conexao.php';
//Sessão
session_start();

//Botão enviar
if(isset($_POST['btn-entrar'])):
    #echo "Clicou"; --> teste
    //array para armazenar os erros:
    $erros = array();
    $username = mysqli_escape_string($conn,$_POST['username']);
    $psw = mysqli_escape_string($conn,$_POST['psw']);

    //if verificar se os campos username e psw estão preenchidos
    if(empty($username) or empty($psw)):
        $erros[]="<li> Atenção!! Username/password precisam ser preenchidos </li>";
    else:
    //else buscar na BD se os dados existem na BD
    $sql = "SELECT username FROM utilizadores WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    //verifica se o username existe na BD:
        if(mysqli_num_rows($result) > 0):
            $psw=md5($psw);
            //verifica se username a senha estão de acordo com a BD 
            $sql = "SELECT * FROM utilizadores WHERE username ='$username' AND psw ='$psw'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 1):
                $dados = mysqli_fetch_array($result);
                mysqli_close($conn); //para encerrar a sessão
                $_SESSION['logado'] = true;
                $_SESSION['id_utilizador']=$dados['id'];
                header('Location: home.php');
            else:
                $erros[] = "<li>Utilizador e/ou senha não estão corretos</li>";
            endif;
             
        else:
            $erros[] = "<li>Utilizador não registado, clique em REGISTAR para fazer seu registo</li>";
            ?>
            <a href="registo.php">Registar</a>
            <?php
        endif;
    endif;
endif;
?>

<!DOCTYPE html>
<html lang="pt">  
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="src/css/styleLogin.css" rel="stylesheet">
<title>Login</title>
</head>
<body>
<h1>Login</h1>

<?php
#verifica se existe erro
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
endif;
?>

<hr>
<div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"><br>
    <label>Username:</label><input type="text" name="username" id="username" placeholder="Enter Username"><br><br>
    <label>Password:</label><input type="password" name="psw" id="psw" placeholder="Enter Password"><br><br>
    <button type="submit" name="btn-entrar">Entrar</button>
    </form>
</div>
<hr>

</body>
</html>