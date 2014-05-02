
<h1>Bem-vindo(a),</h1>
			<h3>
				Esta é sua plataforma de padronização de tickets para auxilio do
				<span>Zendesk</span>.<br> Selecione a op&ccedil;&atilde;o abaixo...
			</h3>
			<section id="opcoes">					
					<?php
					//exibindo imagem
					$baseUrl = base_url('public/assets/') . '/imgs/button_cadastrar.fw.png'; 
					echo anchor('CPrincipal/atualizarTicket',"<img src='$baseUrl' alt='atualizar'>");					
					?>
			</section>