
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="Imagens/pomba.ico" >
		<title>POMBA - Login</title>
		<style type="text/css">
			#fundo{

				background-image: url(Imagens/walp.jpg);
				background-repeat: no-repeat;
				background-size: 100%;

			}
			#login{

				background-color: white;
				width: 600px;
				height: 550px;
				margin-top: 60px;
				border-style: ridge;
				border-color: #bcb8b8;

			}
			#iusuario{

				width: 200px;
				height: 35px;
				border-radius: 5px;
				color: black;
				font-size: 15px;
				font-family: Verdana;
				text-shadow: 1px 1px 1px black;
				background-color: transparent;
				text-align: center;
				border-color: #bcb8b8;
				box-shadow: 1px 1px 5px #bcb8b8;


			}
			#isenha{

				width: 200px;
				height: 35px;
				border-radius: 5px;
				color: black;
				font-size: 15px;
				font-family: Verdana;
				text-shadow: 1px 1px 1px black;
				background-color: transparent;
				text-align: center;
				border-color: #bcb8b8;
				box-shadow: 1px 1px 5px #bcb8b8;
				margin-top: -250px;


			}
			#ibotao{

				background-color: #6d6868;
				color:black;
				text-shadow: 1px 1px 1px black;
				border-radius: 5px;
				width: 100px;
				height: 30px;
				font-family: Verdana;
				border-color: #696969;
				box-shadow: 1px 1px 5px #bcb8b8;
				font-size: 15px;

			}

			#ibotao2{

				text-decoration: none;
				background-color: #003366;
				color:white;
				text-shadow: 1px 1px 1px black;
				border-radius: 5px;
				width: 160px;
				height: 30px;
				font-family: Verdana;
				border-color: #696969;
				box-shadow: 1px 1px 5px #003366;
				font-size: 15px;
				width: 25%;
				line-height: 20px;
				text-decoration: none;
			}

			#p1{

				font-family: Georgia;
				font-size: 20px;
				color: black;
				text-shadow: 1px 1px 1px #003366;



			}
			#mens{

				font-family: Verdana;
				font-size: 20px;
				color: white;
				text-shadow: 1px 1px 1px #003366;
			}
			

		</style>

	</head>
	<body id="fundo">
		<center>
		<div id="login">
			<br><img src="Imagens/pomba.gif"><br><img src="Imagens/pomba.jpg" width="120px" height="120px"> <br>
			<form action="login.php" method="post">
				<p>
				<input id="iusuario" name="usuario" placeholder="Usuário" type="text">
				</p>
				<input id="isenha" name="senha" placeholder="Senha" type="password">
			
				<p></p><br>
				<button type="submit" id="ibotao">&rarrw; Entrar</button><br/><br/>
				<p id="p1">Não possui um cadastro?</p>
			</form>

			<a href="cadastro.php"><button id="ibotao2">&rarrhk; Cadastre-se</button></a>

			</div>

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
							$_SESSION['usuario'] = $usuario;
							header('Location: index.php');
						}else{
							print("<p id=\"mens\">Usuário não cadastrado!");
						}
					}
				}
			?>
		</center>
	</body>
</html>