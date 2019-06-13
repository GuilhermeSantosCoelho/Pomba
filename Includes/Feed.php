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

	while($conteudo = mysqli_fetch_assoc($resultado)){

		$seguidor = $Obj_Conexao->Consulta("SELECT * FROM seguidor WHERE seguidor = '".$_SESSION['username']."' AND seguido = '".$conteudo['username']."'");
		$result_coment = $Obj_Conexao->Consulta("SELECT * FROM comentario WHERE pomba_id = ".$conteudo['id']."");

		$postador = $Obj_Conexao->Consulta("SELECT * FROM pomber WHERE username = '".$conteudo['username']."'");
		
		$pic = mysqli_fetch_assoc($postador);
		$foto_postador = $pic['foto'];
		if($foto_postador == "") $foto_postador = 'Koala.jpg';

		date_default_timezone_set('America/Sao_Paulo' );
		
		$data = date('d/m/Y H:i',strtotime($conteudo['data_hora']));
		
		print("<div id=\"post\">");

		print("<form action=\"Funcoes/Funcoes.php\" id=\"form\" method=\"POST\">");
		print("<img id=\"foto_postador\" src=\"Fotos/Perfil/".$foto_postador."\">");
		print("<b><div id=\"user\">".$conteudo['username']."</div></b> - <div id=\"PostadoEm\"><b><i>".$data."</i></b></div>");

		if($_SESSION['username'] != $conteudo['username']){
			if(mysqli_num_rows($seguidor) == 0){
				print("<form action=\"Funcoes/Funcoes.php\" id=\"seguir\" method=\"POST\">");
				print("<div onclick=\"seguir()\" class='seguir' id=\"seguir_usuario\"><b>Seguir</b></div>");
				print("<input type=\"hidden\" name=\"funcao\" value=\"seguir\" />");
				print("<input type=\"hidden\" name=\"id_user\" value=\"".$conteudo['username']."\" />");
				print("</form>");
			}else{
				print("<div class=\"seguindo\" id=\"seguir_usuario\"><b>Seguindo</b></div>");
			}
		}

		
		
		if($_SESSION['username'] == $conteudo['username'] || $_SESSION['email'] == $conteudo['username']){
			print("<img onclick=\"excluir()\" id=\"lixeira\" src=\"Imagens/lixeira.jpg\"/>");
		}
		print("<br/><p id=\"TextoPost\">".$conteudo['texto']."</p>");
		print("<input type=\"hidden\" name=\"id\" value=\"".$conteudo['id']."\" />");
		print("<input type=\"hidden\" name=\"funcao\" value=\"excluir\" /><br/><br/><br/>");

		if(mysqli_num_rows($result_coment) > 0){
			while($coment = mysqli_fetch_assoc($result_coment)){
				print("<div id=\"div_coment\"><p id=\"coment\">"."<div id=\"user\"><b>".$coment['pomber_username']."</b></div>"." &rarr; ".$coment['comentario']."</p></div><br/>");
			}
		}

		print("</form>");

		print("<br><br><form action=\"Funcoes/Funcoes.php\" id=\"comentario\" method=\"POST\">");
		print("<input type=\"hidden\" name=\"id\" value=\"".$conteudo['id']."\" />");
		print("<br/><br/><textarea name=\"coment\" maxlength=\"300\" rows=\"4\" placeholder=\"Pombe sua resposta\"></textarea>");
		print("<div onclick=\"comentar()\" id=\"comentar_btn\"><b>Comentar</b></div>");
		print("<input type=\"hidden\" name=\"funcao\" value=\"comentar\" />");
		print("</form>");

		print("</div>");
	}

?>