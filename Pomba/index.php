<?php
	
	include('Conexao/DB.class.php');
	$Obj_Conexao = new CONEXAO();

	session_start();

	if (!isset($_SESSION['usuario'])){
		header('Location: login.php');
	}else{
		
		$resultado = $Obj_Conexao->Consulta("SELECT * FROM pomber WHERE username = '".$_SESSION['usuario']."' OR email = '".$_SESSION['usuario']."'");

		$nome = mysqli_fetch_assoc($resultado);
		
		$imagem = $nome['foto'];
		if($imagem == ''){
			$imagem = 'Koala.jpg';
		}else{
			$imagem = $nome['foto'];
		}

		$foto_capa = $nome['capa'];
		if($foto_capa == ''){
			$foto_capa = 'Penguins.jpg';
		}else{
			$foto_capa = $nome['capa'];
		}

		$_SESSION['nome'] = $nome['nome'];
		$_SESSION['username'] = $nome['username'];
		$_SESSION['email'] = $nome['email'];

		$resultado = $Obj_Conexao->Consulta("SELECT * FROM seguidor WHERE seguidor = '".$_SESSION['usuario']."' OR seguidor = '".$_SESSION['usuario']."'");

		$seguindo = mysqli_num_rows($resultado);

		$resultado = $Obj_Conexao->Consulta("SELECT * FROM seguidor WHERE seguido = '".$_SESSION['usuario']."' OR seguido = '".$_SESSION['usuario']."'");

		$seguidores = mysqli_num_rows($resultado);

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="/path/to/si.files.js"></script>
		<meta charset="utf-8">
		<title>Pomba</title>
		<link rel="stylesheet" type="text/css" href="CSS/index.css">
			
			</div>

		<script type="text/javascript">
			function excluir(){
				var theForm = document.getElementById('form');
				theForm.submit();
			}
			function comentar(){
				var theForm = document.getElementById('comentario');
				theForm.submit();
			}
			function seguir(){
				var theForm = document.getElementById('seguir');
				theForm.submit();
			}
		</script>

		<style type="text/css">

			#TextoPost{
				font-size: 25px;
			}

			#PostadoEm{
				display: inline;
				color: gray;
			}

			#Bemvindo{
				margin-right: 100px;
				float: left;
				margin-top: 5px;
				color: black;
			}

			#pomba{
				width:100%;
				border-radius: 70px;
				height: 107px;	
			}

			#header{
				
				height: 100px;
				width: 100%;
				background-color: white;
			}

			#Usuario{
				float: right;
				margin-right: 80px;
				margin-top: 50px;
			}

			#Sair{
				float: right;		
				color:transparent;
				text-shadow: 1px 1px 1px black;
				border-radius: 6px;
				height: 50px;
				font-family: Verdana;
				border-color: white;
				width: 25%;
			}

			button{
				float: right;
				background-color: transparent;
				margin-top: -100px;
				margin-right: -60px;
			}

			#feed{
				margin-top: 75px;
				width: 50%;
				border:2px black solid;
				border-radius: 5px;
				text-align: center;
				margin-left: 340px;
			}

			#seguir_usuario{
				line-height: 44px;
				float: left;
				margin-top: 10px;
				margin-left: 30px;
				border: 2px black solid;
				width: 20%;
				border-radius: 10px;
				height: 50px;
				display: inline;
				cursor: pointer;
			}

			#postar{
				margin-top: 5px;
				width: 50%;
				margin-left: 350px;
				border-radius: 5px;
				text-align: center;
				background-color: white;
			}

			#post{
				margin-bottom: 50px;
				text-align: center;
			}

			#post .user{
				float: left;
				margin-left: 60px;
				color: green;
			}

			#post .data{
				float: right;
				margin-right: 60px;
				display: inline;
			}

			hr{
				width: 90%;
			}

			textarea{
				width: 60%;
				border-radius: 10px;
				height: 70px;
				border-color: #828282;
				box-shadow: 1px 1px 1px black;
				font-family: Verdana;
				font-size: 20px;
				color: black;
				text-shadow: 1px 1px 2px #104E8B;
			}

			#lixeira{
				width: 3%;
				cursor: pointer;
				float: right;
				margin-right: 50px;
			}

			#comentar_btn{
				margin-top: 20px;
				border:2px black solid;
				width: 10%;
				border-radius: 5px;
				cursor: pointer;
				margin-left: 300px;
				height: 30px;
				line-height: 28px;
			}

			#coment{
				float: left;
				margin-left: 50px;
				display: block;
			}

			#div_coment{
				float: left;
				font-size: 20px;
				margin-left: 80px;
			}

			#user{
				display: inline;
				color: green;
			}

			#Perfil{
				width: 33.5%;
				float: left;
				height: 300px;
				border-radius: 5px;
			}

			#logo{
				line-height: 40px;
				width: 30%;
				height: 107px;
				border:2px black solid;
				border-radius: 70px;
				float: left;
				margin-left: 5px;
				margin-top: 5px;
				background: #d1d1d1;
				cursor: pointer;	
			}

			#kappa{
				margin-left: 310px;
			}

			#FotoCapa{
				width: 16%;
				margin-top: 20px;
				float: right;
			}

			#FotoPerfil{
				width: 100%;
				margin-left: 0px;
			}

			#perfil_objetos{
				width: 80%;
				border:2px black solid;
				height: 303px;
				margin-left: 130px;
				border-radius: 5px;
				background-color: #d6d6d6;
			}

			h2{
				display: inline;
				margin-right: 30px;
				color: #1874CD;
				text-shadow: 1px 1px 1px black;
			}

			#postar_btn{
				background-color: #F0FFFF;
				width: 80px;
				height: 30px;
				box-shadow: 1px 1px 1px #104E8B;
				border-color: #104E8B;
				color: black;
				text-shadow: 1px 1px 1px #104E8B;
				border-radius: 10px;
			}
			h4{
				font-family: Verdana;
				font-size: 20px;
				color: black;
				text-shadow: 1px 1px 2px #104E8B;
			}

			h3{
				display: inline;
				margin-right: 30px;
				color: #1874CD;
				text-shadow: 1px 1px 1px black;
			}

		</style>
		<script type="text/javascript">

			function Update(){
				var theForm = document.getElementById('foto');
				theForm.submit();
			}
			function Update_capa(){
				var theForm = document.getElementById('kappa');
				theForm.submit();
			}

		</script>
	</head>
	<body>

		<header>
			<div id="header">
				<img src="Imagens/pomba.jpg" width="90px"><img src="Imagens/pomba.gif" width="300px">
				<form method="GET" action="Funcoes/Pesquisar.php">
					<input type="search" name="pesquisa" id="Pesquisa" onkeydown="Pesquisar()">
					<input type="submit" name="" value="Pesquisar">
				</form>
				<script type="text/javascript">
					function Pesquisar(){

					}
				</script>
				<div id="Usuario">
					<h2 id="Bemvindo">Bem-vindo(a), <?= $_SESSION['nome']?>!</h2><br/>
					<a href="logout.php"><button id="Sair"> <img src="Imagens/botao.png" width="50px" height="50px"></button></a>
				</div>
		</header>
		<br/><br/><br/>
		<div style="background: url(Fotos/Capa/<?= $foto_capa ?>)" id="perfil_objetos">
			<form id="kappa" action="update_capa.php" method="post" enctype="multipart/form-data">
				<input id="FotoCapa" type="file" name="img" onchange="Update_capa()" class="file1" >
				<input type="hidden" name="cadastrar" value="perfil" />
			</form><br/><br/>
			<div  id="Perfil">
				<div id="logo"><img id="pomba" src="Fotos/Perfil/<?= $imagem ?>"/>
					<form action="update.php" id="foto" method="post" enctype="multipart/form-data">
						<input type="file" name="img" onchange="Update()" id="FotoPerfil" >
					  	<input type="hidden" name="cadastrar" value="perfil" />
					</form>
				</div>			
			</div>
		</div>
		<br/><h3 id="texto_user">Usuario: @<?= $_SESSION['username'] ?></h3><h3 id="texto_user">Seguidores:<?= $seguidores ?></h3><h3 id="texto_user">Seguindo:<?= $seguindo ?></h3>
		<div id="postar">
				<form method="POST" action="Funcoes/Funcoes.php">
					<h4>O que deseja pombar?</h4>
					<br>
					<input type="hidden" name="funcao" value="postar" />
					<textarea required name="texto" rows="3"></textarea><br/><br/>
					<input id="postar_btn" value="Pombar" type="submit"><br/><br/>
				</form>
		</div>
		</div>

		<div id="feed">
			<?php include("Includes/Feed.php"); ?>
			<br/><br/><br/>
		</div>
		<br/><br/><br/><br/><br/><br/>
	</body>

</html>