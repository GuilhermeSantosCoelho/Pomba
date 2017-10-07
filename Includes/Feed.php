<style type="text/css">
	#foto_postador{
		width: 5%;
		border-radius: 50px;
		float: left;
		margin-left: 40px;
		margin-bottom: 20px;
	}
</style>

<?php

	$resultado = $Obj_Conexao->Consulta("SELECT * FROM pomba ORDER BY data_hora DESC");
	$postador = $Obj_Conexao->Consulta("SELECT * FROM pomber");

	$pic = mysqli_fetch_assoc($postador);
	$foto_postador = $pic['foto'];

	while($conteudo = mysqli_fetch_assoc($resultado)){

		$seguidor = $Obj_Conexao->Consulta("SELECT * FROM seguidor WHERE seguidor = '".$_SESSION['username']."' AND seguido = '".$conteudo['username']."'");
		$result_coment = $Obj_Conexao->Consulta("SELECT * FROM comentario WHERE pomba_id = ".$conteudo['id']."");

		date_default_timezone_set( 'America/Sao_Paulo' );
		
		$data = date('d/m/Y H:i',strtotime($conteudo['data_hora']));
		
		print("<div id=\"post\">");
		if($_SESSION['username'] != $conteudo['username']){
			if(mysqli_num_rows($seguidor) == 0){
				print("<br/><form action=\"Funcoes/Funcoes.php\" id=\"seguir\" method=\"POST\">");
				print("<div onclick=\"seguir()\" id=\"seguir_usuario\">[Seguir] ".$conteudo['username']."</div>");
				print("<input type=\"hidden\" name=\"funcao\" value=\"seguir\" />");
				print("<input type=\"hidden\" name=\"id_user\" value=\"".$conteudo['username']."\" />");
				print("</form>");
			}else{
				print("<div id=\"seguir_usuario\">[Seguindo] ".$conteudo['username']."</div>");
			}
		}

		print("<br/><br/><form action=\"Funcoes/Funcoes.php\" id=\"form\" method=\"POST\">");
		print("<img id=\"foto_postador\" src=\"Fotos/Perfil/".$foto_postador."\">");

		print("<b><div id=\"user\">".$conteudo['username']."</div></b> - <div id=\"PostadoEm\"><b><i>".$data."</i></b></div>");
		if($_SESSION['username'] == $conteudo['username'] || $_SESSION['email'] == $conteudo['username']){
			print("<img onclick=\"excluir()\" id=\"lixeira\" src=\"Imagens/lixeira.jpg\"/>");
		}
		print("<br/><hr/><p id=\"TextoPost\">".$conteudo['texto']."</p>");
		print("<input type=\"hidden\" name=\"id\" value=\"".$conteudo['id']."\" />");
		print("<input type=\"hidden\" name=\"funcao\" value=\"excluir\" /><hr/><br/>");

		if(mysqli_num_rows($result_coment) > 0){
			while($coment = mysqli_fetch_assoc($result_coment)){
				print("<div id=\"div_coment\"><p id=\"coment\">"."<div id=\"user\"><b>".$coment['pomber_username']."</b></div>"." &rarr; ".$coment['comentario']."</p></div><br/>");
			}
		}

		print("</form>");

		print("<form action=\"Funcoes/Funcoes.php\" id=\"comentario\" method=\"POST\">");
		print("<input type=\"hidden\" name=\"id\" value=\"".$conteudo['id']."\" />");
		print("<br/><br/><textarea name=\"coment\" maxlength=\"300\" rows=\"4\" placeholder=\"Comentar...\"></textarea>");
		print("<div onclick=\"comentar()\" id=\"comentar_btn\">Comentar</div>");
		print("<input type=\"hidden\" name=\"funcao\" value=\"comentar\" />");
		print("</form>");

		print("</div>");
		print("<hr/>");
	}

?>