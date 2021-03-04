<?php
// Para encerrar a sessão
session_start();
session_unset();
session_destroy();
header('Location: indexLogin.php');
?>

