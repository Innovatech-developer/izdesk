<form action="processaTicket" method="post" id="formulario-cadastro">
<?php //verificando se a sessao de inserir no banco de dados foi efetuada com sucesso
if($this->session->flashdata('atualizaok')) {
	echo "<p class='success'>".$this->session->flashdata('atualizaok').'</p>';	//imprimindo mensagem de inserção bem sucedida
}

echo validation_errors("<p class='erro'>","</p>");//imprime os erros de validação do formulario, podendo ser impresso em forma de tags
?>
	<!-- -->
	<div id="formleft">
		<label for="cliente">Cliente:</label> <input type="text" id="cliente"
			name="cliente" /><br> <label for="email">E-mail:</label> <input
			type="email" id="email" name="email" /><br> <label for="telefone">Telefone:</label>
		<input type="text" id="telefone" onKeyup="digitado(event)"
			name="telefone" /><br> <label for="setor">Setor:</label> <input
			type="text" id="setor" name="setor" /><br> <label for="codCliente">CÃ³digo
			do cliente:</label> <input type="text" name="codCliente"
			id="codCliente" onKeyup="digitado(event)"></input><br> <label
			for="serie">SÃ©rie:</label> <input type="text" name="serie"
			id="serie" onKeyup="digitado(event)"></input><br> <label
			for="tipoSolicitacao">Tipo de solicitaÃ§Ã£o:</label> <select
			id="tipoSolicitacao" name="tipoSolicitacao">
			<option>Problema com equipamento</option>
			<option>Problema com suprimento</option>
			<option>Problema com software</option>
			<option>Solicita&ccedil;&atilde;o de suprimento</option>
			<option>Solicita&ccedil;&atilde;o de medi&ccedil;&atilde;o</option>
			<option>Diverg&ecirc;ncia da medi&ccedil;&atilde;o</option>
			<option>Contesta&ccedil;&atilde;o de Fatura do contrato</option>
			<option>Manuten&ccedil;&atilde;o preventiva</option>
			<option>Troca de equipamento por problemas t&eacute;cnicos</option>
			<option>Mudan&ccedil;as contratuais
				(amplica&ccedil;&atilde;o/redu&ccedil;&atilde;o/negocia&ccedil;&atilde;o)</option>
			<option>Rechamado de Problema com equipamento</option>
			<option>Treinamento ou Reciclagem</option>
			<option>Problema com licen&ccedil;a de software</option>
			<option>Prorroga&ccedil;&atilde;o de pagamento</option>
			<option>Instalar equipamento de contrato</option>
			<option>Enviar equipamento de contrato</option>
			<option>Desinstalar equipamento de contrato</option>
			<option>Retornar equipamento de contrato</option>
			<option>Cancelamento de Contrato</option>
			<option>Interesse comercial de compra</option>
			<option>Instalar equipamento</option>
			<option>Problema de equipamento em Garantia</option>
			<option>Devolu&ccedil;&atilde;o equipamento</option>
			<option>Entregar equipamento</option>
			<option>Interesse comercial de loca&ccedil;&atilde;o</option>
			<option>Interesse proposta de servi&ccedil;o avulso</option>
			<option>Problema no desktop</option>
			<option>Problema no laptop</option>
			<option>Problema no software</option>
			<option>Suporte a pre-venda</option>
			<option>Desenvolvimento de aplicativos/sistemas</option>
			<option>Treinamento</option>
			<option>Problema na internet</option>
			<option>Problema no sistema</option>
			<option>Problema no servidor</option>
			<option>Problema na telefonia fixa ou celular</option>
			<option>Problema na CFTV</option>
			<option>Problema de virus</option>
			<option>Problema de perda de backup/restore</option>
			<option>Desenvolvimento de sistema</option>
			<option>Desenvolvimento de Projeto de Outsourcing</option>
			<option>Teste de sistema/software</option>
		</select>
	</div>

	<!--  -->
	<div id="formRight">
		<label for="modelo">Modelo:</label> <input id="modelo" name="modelo"
			type="text" onKeyup="digitado(event)"><br> <label for="nTicket">Numero
			do ticket:</label> <input type="text" name="nTicket" id="nTicket"
			onKeyup="digitado(event)"></input><br> <label for="equipamento">Equipamento:</label>
		<input type="text" name="equipamento" id="equipamento"></input><br> <label
			for="notaFiscal">NF:</label> <input type="text" name="notaFiscal"
			id="notaFiscal"></input><br> <label for="atribuido">Atribuir
			&agrave;:</label> 
		<select id="atribuido" name="atribuido">
			<?php
			//imprimindo agentes
			foreach ($agents as $groups) {
				echo "<option>$groups->name</option>";
			} 
			?>					
		</select> 
		<label for="status">Status do Ticket:</label> <select
			id="status" name="status">
			<option>Aberto</option>
			<option>Pendente</option>
		</select> <label for="prioridade">Prioridade:</label> <select
			id="prioridade" name="prioridade">
			<option>Alta</option>
			<option>M&eacute;dia</option>
			<option>Baixa</option>
		</select>

	</div>

	<button type="submit" name="botao02" id="botao02" class="md-trigger"
		data-modal="modal-11">Salvar</button>
	<?php echo anchor('CPrincipal/index','Voltar',"id='botaoVoltar'");?>
	</button>
</form>