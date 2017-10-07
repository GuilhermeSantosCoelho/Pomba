#logo{
				line-height: 40px;
				width: 10%;
				height: 133px;
				border:2px black solid;
				border-radius: 10px;
				float: left;
				margin-left: 5px;
				margin-top: 5px;
				background: #d1d1d1;
				cursor: pointer;	
			}

			<div style="background: url(Fotos/Capa/<?= $foto_capa ?>");" id="header">


			<form action="update_capa.php" id="kappa" method="post" enctype="multipart/form-data">
					<input type="file" name="img" onchange="Update_capa()" class="file" >
				  	<input type="hidden" name="cadastrar" value="perfil" />
				  	</form>