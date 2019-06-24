<?php
	include('Conexao/DB.class.php');
	$Obj_Conexao = new CONEXAO();

	session_start();

	$erro = null;

	if (isset($_SESSION['usuario'])){
		header('Location: index.php');
	}else{
		if (isset($_POST['usuario'])){
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];

			$resultado = $Obj_Conexao->Consulta("SELECT * FROM pomber WHERE username = '$usuario' AND senha = '$senha'");

			if(mysqli_num_rows($resultado) > 0){
				return true;
			}else{
				print("O nome de usuário e a senha fornecidos não correspondem às informações em nossos registros. Verifique-as e tente novamente.");
			}
		}
	}
?>
