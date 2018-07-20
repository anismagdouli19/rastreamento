function motoristaConfirmaInativar(Nome){
	return confirm("Tem certeza que deseja inativar o motorista " + Nome + "?");
}

function motoristaConfirmaExcluir(Nome){
	return confirm("Tem certeza que deseja excluir definitivamente\no motorista " + Nome + "?");
}

function motoristaEditaCompleto(ID){
    setTimeout("window.location='motoristaDetalhe.php?motorista=" + ID + "'", 3500);
}

function motoristaEditaIncompleto(ID){
    setTimeout("window.location='motoristaEditar.php?motorista=" + ID + "'", 4500);
}

function usuarioEditarCompleto(ID){
    setTimeout("window.location='usuarioEditar.php?userid=" + ID + "'", 3500);
}

function usuarioEditarIncompleto(ID){
    setTimeout("window.location='usuarioEditar.php?userid=" + ID + "'", 4500);
}

function motoristaCadastroCompleto(){
    setTimeout("window.location='motoristaVisualizar.php'", 3500);
}

function motoristaCadastroIncompleto(){
    setTimeout("window.location='motoristaCriar.php'", 4500);
}

function adminCadastroCompleto(){
    setTimeout("window.location='usuarioVisualizar.php'", 3500);
}

function adminCadastroIncompleto(){
    setTimeout("window.location='adminEditar.php'", 4500);
}

function usuarioConfirmaInativar(Nome){
	return confirm("Tem certeza que deseja inativar o usuário " + Nome + "?");
}

function usuarioConfirmaExcluir(Nome){
	return confirm("Tem certeza que deseja excluir definitivamente o usuário " + Nome + "?\n\nAo excluir um usuário, todos os veículos associados também são excluídos. Esta ação não poderá ser desfeita, confirma?");
}

function usuarioCadastroIncompleto(){
    setTimeout("window.location='usuarioCriar.php'", 3500);
}

function usuarioCadastroCompleto(){
    setTimeout("window.location='usuarioVisualizar.php'", 3500);
}

function veiculoCadastroCompleto(ID){
    setTimeout("window.location='veiculoVisualizar.php?userid=" + ID + "'", 3500);
}

function veiculoCadastroIncompleto(ID){
    setTimeout("window.location='veiculoCriar.php?userid=" + ID + "'", 3500);
}

function finalizaVinculo(){
    setTimeout("window.location='vinculoCriar.php'", 3700);
}

function vinculoConfirmaExcluir(){
	return confirm("Tem certeza que deseja excluir este vínculo?");
}

function veiculoConfirmaExcluir(){
	return confirm("Tem certeza que deseja excluir este veículo?");
}

function veiculoEditaIncompleto(userid, veiculoid){
	setTimeout("window.location='veiculoEditar.php?userid=" + userid + "&idVeiculo=" + veiculoid + "'", 3500);
}

function veiculoEditaCompleto(userid, veiculoid){
	setTimeout("window.location='veiculoDetalhe.php?userid=" + userid + "&idVeiculo=" + veiculoid + "'", 1500);
}