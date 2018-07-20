<?php
	$inativarVeiculo = isset($_GET['inativarVeiculo']) ? $_GET['inativarVeiculo'] : null;

	if($inativarVeiculo == null){
		$res = mysqli_query($conexao, "SELECT imei, name FROM bem WHERE activated = 'S' AND cliente = '$_SESSION[id]' ORDER BY name");
		$resGrupo = mysqli_query($conexao, "SELECT id, nome FROM grupo WHERE cliente = '$_SESSION[id]' ORDER BY nome");
		
		if(mysqli_num_rows($res) == 0){
			echo "Nenhum veículo encontrado.";
		}
		else{
			echo "<select id='bens' name='bens' class='form-control' onchange='alterarComboVeiculo(this.value);'><option value='' selected>Selecione</option>";

			if($resGrupo !== false && mysqli_num_rows($resGrupo) > 0){
				echo "<optgroup label='Grupos'>";
				for($i=0; $i < mysqli_num_rows($resGrupo); $i++) {
					$row = mysqli_fetch_assoc($resGrupo);
					echo "<option value='grupo_$row[id]'>$row[nome]</option>";
				}
				echo "</optgroup>";
			}

			echo "<optgroup label='Veículos'>";
		
			while($row = mysqli_fetch_assoc($res)){
				echo "<option value='$row[imei]'>$row[name]</option>";
			}
			
			echo "</optgroup></select>";
		}
	}
	else{
		mysqli_query($conexao, "UPDATE bem set activated = 'N' WHERE imei = '$inativarVeiculo' AND activated = 'S'");
	}
?>