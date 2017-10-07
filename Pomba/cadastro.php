<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>POMBA - Cadastro</title>
		<link rel="shortcut icon" href="Imagens/pomba3.png.ico" >
		<style type="text/css">
			a{
				text-decoration: none;
			}

			#erro{
				font-family: Verdana;
				font-size: 20px;
				color: #8B0000;
				text-shadow: 1px 1px 1px black;
			}
			#sucess{
				color: black;
				font-family: Verdana;
				font-size: 20px;
				text-shadow: 1px 1px 1px #458B00;
			}
			#fundo{
				background-image: url(Imagens/walp.jpg);
				background-repeat: no-repeat;
				background-size: 100%;
			}
			#cadastro{
				background-color: white;
				width: 600px;
				height: 690px;
				margin-top: 10px;
				border-style: ridge;
				border-color: #6d6868;
			}
			#form{

				width: 200px;
				height: 20px;
				border-radius: 0px;
				color: #003366;
				font-size: 15px;
				font-family: Verdana;
				text-shadow: 1px 1px 1px #003366;
				background-color: transparent;
				text-align: center;
				border-color: transparent;
				border-bottom-color: #6d6868;
			}
			#cadastrar{
				background-color: #696969;
				color:black;
				text-shadow: 1px 1px 1px black;
				border-radius: 5px;
				width: 23%;
				height: 30px;
				font-family: Verdana;
				border-color: #696969;
				box-shadow: 1px 1px 5px #003366;
				font-size: 15px;
			}
			#bot2{
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
			}
			#p2{
				font-family: Georgia;
				font-size: 20px;
				color: black;
				text-shadow: 1px 1px 1px #003366;
			}
		</style>
	</head>
	<body id="fundo">
		<center>
		<div id="cadastro">
		<br><img src="Imagens/pomba.gif"><br><br><img src="Imagens/cadastro2.gif" width="200px">
					<p></p>
			<br><form action="cadastro.php" method="POST">
					<input id="form" required name="nome" minlength="3" placeholder="Nome" type="text"><br><br>

					<br><input id="form" name="usuario" minlength="3" required placeholder="Nome de Usuário" type="text"><br/><br/>

					<br><input id="form" name="email" placeholder="E-mail" required type="email"><br/><br/>

					<br><input id="form" name="senha" minlength="6" required maxlength="15" pattern="(?=.*\d)(?=.*[a-z]).{0,}" placeholder="Senha" type="password" title="A senha precisa conter letras maiúsculas, minúsculas e números!"><br/><br/>

					<br><input id="form" name="confirmacao" placeholder="Confirme sua senha" required type="password"><br/><br/>

					<br><button id="cadastrar" type="submit">&rarrw; Cadastrar</button><br/>
			</form>

			<?php
				include('Conexao/DB.class.php');
				$Obj_Conexao = new CONEXAO();

				if(count($_POST) > 0){
					$User = $_POST['usuario'];
					$Senha = $_POST['senha'];
					$Email = $_POST['email'];
					$Nome = $_POST['nome'];

					if($Senha != $_POST['confirmacao']){
						die("<p id=\"erro\">As senhas não são iguais!</p>");
					}

					$resultado = $Obj_Conexao->Consulta("INSERT INTO pomber VALUES('$User','$Senha','$Email','$Nome','','')");

					if(!$resultado){
						die("<br><p id=\"erro\">Nome de usuário já existente!</p></br>");
					}else{
						die("<br><p id=\"sucess\">Usuário cadastrado com sucesso!</p>". "<a href=\"login.php\"><button id=\"bot2\">Login</button></a>");
					}
				}
			?>

						<p id="p2">Já possui um cadastro?</p><a href="login.php"><button id="bot2">	&rarrhk; Faça seu login!</button></a>

</div>

		</center>

	</body>
</html>