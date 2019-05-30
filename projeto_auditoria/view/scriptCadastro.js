$("#cpf").mask("00000000000");
$("#siape").mask("0000000");
function conteudo() {
	var type = document.getElementById("tipo");
	var itemSelecionado = type.options[type.selectedIndex].value;
	if (itemSelecionado == "dirigente") {

		document.getElementById("dir-unidade").style.display="block";
	}
	else {
		document.getElementById("dir-unidade").style.display="none";
	}
}

function validaSenha() {
	if (document.getElementById("rsenha").value != document.getElementById("senha").value) {
		alert("Senhas incompatíveis");
		return false;
	}
	else {
		alert("Cadastro realizado com sucesso!");
	}
}