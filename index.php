<?php
session_start();
require 'config.php';

if(empty($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$email = '';
$codigo = '';

$sql = "SELECT email, codigo FROM usuarios WHERE id = '".addslashes($_SESSION['logado'])."'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$info = $sql->fetch();
	$email = $info['email'];
	$codigo = $info['codigo'];
}
?>
<h1>�rea interna do sistema</h1>
<p>Usu�rio: <?php echo $email; ?> - <a href="sair.php">Sair</a></p>
<p>Link: http://localhost/registro_convite/cadastrar.php?codigo=<?php echo $codigo; ?></p>