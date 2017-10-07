<?php

	include('../Conexao/DB.class.php');
	$Obj_Conexao = new CONEXAO();

	session_start();

	date_default_timezone_set( 'America/Sao_Paulo' );
		
	if(isset($_POST['id']) AND $_POST['funcao2']=='excluir'){
		$comentario = $_POST['coment'];
		$id = $_POST['id'];
		$id_coment = $_POST['id_coment'];
		$resultado = $Obj_Conexao->Consulta("DELETE FROM comentario WHERE id = $id_coment");
	}else if(isset($_POST['funcao']) AND $_POST['funcao']=='postar'){
		$post = $_POST['texto'];
		$data_hora = date('Y-m-d H:i:s');
		$resultado = $Obj_Conexao->Consulta("INSERT INTO pomba VALUES(0,'$post','$data_hora','".$_SESSION['username']."')");
	}else if(isset($_POST['id']) AND $_POST['funcao']=='excluir'){
		$id = $_POST['id'];
		$resultado = $Obj_Conexao->Consulta("DELETE FROM comentario WHERE pomba_id = $id");
		$resultado = $Obj_Conexao->Consulta("DELETE FROM pomba WHERE id = $id");
	}else if(isset($_POST['id']) AND $_POST['funcao']=='comentar'){
		$comentario = $_POST['coment'];
		$id = $_POST['id'];
		$resultado = $Obj_Conexao->Consulta("INSERT INTO comentario VALUES(0,'$id','".$_SESSION['username']."','$comentario')");
	}else if(isset($_POST['funcao']) AND $_POST['funcao']=='seguir'){
		$id_user = $_POST['id_user'];
		print($_SESSION['username']."asdasd".$id_user);
		$resultado = $Obj_Conexao->Consulta("INSERT INTO seguidor VALUES(0,'".$_SESSION['username']."','$id_user')");
		if(!$resultado){
			die("Erro");
		}
	}
	
	header('location: ../index.php');
?>