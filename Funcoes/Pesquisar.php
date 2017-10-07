<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#seguir{
			width: 70%;
			border: 2px #489293 solid;
			border-radius: 10px;
		}

		#username{

		}

		img{
			width: 10%;
			border-radius: 50px;
			margin-top: 20px;
		}

		#botao_seguir{
			margin-bottom: 20px;
			border: 2px #489293 solid;
			width: 10%;
			border-radius: 10px;
			cursor: pointer;
		}
	</style>

	<script type="text/javascript">
		function seguir(){
			var theForm = document.getElementById('seguir');
			theForm.submit();
		}
	</script>

</head>
<body>

	<center>

		<?php

			session_start();

			include('../Conexao/DB.class.php');
			$Obj_Conexao = new CONEXAO();

			if(isset($_GET)){
				$pesquisa = $_GET['pesquisa'];
				$resultado = $Obj_Conexao->Consulta("SELECT * FROM pomber WHERE username LIKE '".$pesquisa."%'");
				$seguidor = $Obj_Conexao->Consulta("SELECT * FROM seguidor WHERE seguidor = '".$_SESSION['username']."'");
				$seguidores = mysqli_fetch_assoc($seguidor);
				while($usuario = mysqli_fetch_assoc($resultado)){
					if($_SESSION['username'] != $usuario['username']){
						print("<form method=\"POST\" id=\"seguir\">");
						print("<div id=\"seguir\">");
						print("<img src=\"../Fotos/Perfil/".$usuario['foto']."\">");
						print("<h3 id=\"username\">".$usuario['username']."</h3>");
						if($seguidores['seguido'] == $usuario['username']){
							print("<div id=\"botao_seguir\" onclick=\"Nao_Seguir()\">Deixar de seguir</div>");
							print("<input type=\"hidden\" name=\"funcao\" value=\"nao_seguir\" ");
						}else{
							print("<div id=\"botao_seguir\" onclick=\"Seguir()\">Seguir</div>");
							print("<input type=\"hidden\" name=\"funcao\" value=\"seguir\" ");
						}
						print("<input type=\"hidden\" name=\"seguido\" value=\"".$usuario['username']."\" ");
						print("</div>");
						print("</form>");
					}
				}
			}

		?>

	</center>

	<?php

		if(isset($_POST)){
			if($_POST['funcao']=='seguir'){
				$seguido = $_POST['seguido'];
				$resultado = $Obj_Conexao->Consulta("INSERT INTO seguidor VALUES(null,'".$_SESSION['username']."','$seguido')");
			}else{
				$seguido = $_POST['seguido'];
				$resultado = $Obj_Conexao->Consulta("DELETE FROM seguidor WHERE seguidor = '".$_SESSION['username']."' AND seguido = '$seguido' ");
			}
		}

	?>

</body>
</html>
