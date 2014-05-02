<?php if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' ); // desabilitando acesso direto ao arquivo

// Carregando class do cliente
use Zendesk\API\Client;

// carregando as classes
function __autoload($class) {
	$path = array (
			'core',
			'libraries',
			'models' 
	);	
	if (strpos ( $class, 'CI_' ) !== 0) {
		foreach ( $path as $dir ) {
			if (file_exists ( APPPATH . $dir . '/' . strtolower ( $class ) . '.php' ))
				include_once (APPPATH . $dir . '/' . strtolower ( $class ) . '.php');
		}
	}
}

class ZendeskConnect extends \CI_Model {
	/*
	 * atributos
	 */
	
	/*   // dados de acesso teste
	private $subdomain = "izdesk";
	private $username = "wilker@inoveagora.com.br";
	private $token = "G29lxQNmfKBwFwLXujP4hHX0dYcUnt1jckor8t8C"; 	// replace this with your token
	private $oAuthId = "izdesk"; 									// The value you entered into the OAuth 'Unique Identifier' field
	private $oAuthSecret = "71ea269795"; 							// The OAuth secret given to you by Zendes
	private $password = "123456";
	private $client;  */ 
	
	//dados de acesso Innovatech
	private $subdomain = "innovatech";								//innovatech
	private $username = "pcdiniz@inoveagora.com.br";				//innovatech
	private $token = "0CondGzIPY360VppBn9BmyqDVGfx5caKCC3NGHCV"; 	// replace this with your token innovatech
	private $oAuthId = "izdesk";          							// The value you entered into the OAuth 'Unique Identifier' field innovatech
	private $oAuthSecret = "bd398714ac";							//innovatech
	private $password = "#12345678Ok";	 							//innovatech 
	
	//retorna todos os tickets
	public function buscarTickets() {
		try {
			/*
			 * Criando objeto cliente
			*/
			$this->client = new Client($this->subdomain, $this->username);	// passando informações de autenticação
			$this->client->setAuth ( 'token', $this->token ); 				// set either token or password
			
			// recuperando todos os tickets
			$tickets = $this->client->tickets()->findAll();
			
			return $tickets;
		}
		catch (Exception $err) {
			//code here
		}
	}
	
	//retorna todos os agents
	public function buscarAgents() {
		try {
			/*
			 * Criando objeto cliente
			*/
			$this->client = new Client($this->subdomain, $this->username);	// passando informações de autenticação
			$this->client->setAuth ( 'token', $this->token ); 				// set either token or password
			
			//buscando grupos
			$arrayGroups = $this->client->users()->findAll();
			$groups = $arrayGroups->users;//acessando o array de ususarios
			
			return $groups;
		}
		catch (Exception $err) {
			echo "Erro! Ultrapassado o tempo limite de coneção com o Zendesk<br>
					Favor verificar sua conecção com a internet, ou chame o suporte.";
			die;
		}
	}
	
	//função para atualizar os tickets
	public function atualizaTicket($dados) {
		
		// convertendo idioma
		if ($dados ['prioridade'] == 'Alta') {
			$dados ['prioridade'] = 'urgent';
		} else if ($dados ['prioridade'] == 'Media') {
			$dados ['prioridade'] = 'normal';
		} else {
			$dados ['prioridade'] = 'low';
		}
		// convertendo idioma
		if ($dados ['status'] == 'Aberto') {
			$dados ['status'] = 'open';
		} else if ($dados ['status'] == 'Pendente') {
			$dados ['status'] = 'pending';
		} else if ($dados ['status'] == 'Resolvido') {
			$dados ['status'] = 'solved';
		} else {
			$dados ['status'] = 'hold';
		}
		
		/*
		 * Criando objeto cliente para atualização
		 */
		$this->client = new Client($this->subdomain, $this->username);	// passando informações de autenticação
		$this->client->setAuth ( 'token', $this->token ); 				// set either token or password
		
		//atualizando ticket
		if($dados['tipoSolicitacao']  == 'Problema com equipamento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 'Ticket:' . $dados['nTicket'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					$dados['modelo'] . ' - ' .
					$dados['serie'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
						
					"status" =>  $dados['status'],
						
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Problema com suprimento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
						
					"status" =>  $dados['status'],
						
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Problema com software') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Solicitação de suprimento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Solicitação de medição') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Divergência da medição') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Contestação de Fatura do contrato') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Manutenção preventiva') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Troca de equipamento por problemas técnicos') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					$dados['codCliente'] . ' - ' .
					'Cod.'. $dados['modelo'] . ' - ' .
					'Cod.'. $dados['serie'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Troca de equipamento por problemas técnicos') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Rechamado de Problema com equipamento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					$dados['codCliente'] . ' - ' .
					'Cod.'. $dados['modelo'] . ' - ' .
					'Cod.'. $dados['serie'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Treinamento ou Reciclagem') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Problema com licença de software') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Prorrogação de pagamento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Instalar equipamento de contrato') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Enviar equipamento de contrato') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Desinstalar equipamento de contrato') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Retornar equipamento de contrato') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Cancelamento de Contrato') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Interesse comercial de compra') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Instalar equipamento') {
		$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Problema de equipamento em Garantia') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
						
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					$dados['codCliente'] . ' - ' .
					$dados['notaFiscal'] . ' - ' .
					'Cod.'. $dados['modelo'] . ' - ' .
					'Cod.'. $dados['serie'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
						
			));
		}
		else if($dados['tipoSolicitacao']  == 'Devolução equipamento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Entregar equipamento') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Interesse comercial de locação') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Interesse proposta de serviço avulso') {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));
		}
		else if($dados['tipoSolicitacao']  == 'Problema no desktop' ||
		$dados['tipoSolicitacao']  == 'Problema no laptop' ||
		$dados['tipoSolicitacao']  == 'Problema no software' ||
		$dados['tipoSolicitacao']  == 'Suporte a pre-venda' ||
		$dados['tipoSolicitacao']  == 'Desenvolvimento de aplicativos/sistemas' ||
		$dados['tipoSolicitacao']  == 'Treinamento' ||
		$dados['tipoSolicitacao']  == 'Problema na internet' ||
		$dados['tipoSolicitacao']  == 'Problema no sistema' ||
		$dados['tipoSolicitacao']  == 'Problema no servidor' ||
		$dados['tipoSolicitacao']  == 'Problema na telefonia fixa ou celular' ||
		$dados['tipoSolicitacao']  == 'Problema na CFTV' ||
		$dados['tipoSolicitacao']  == 'Problema de virus' ||
		$dados['tipoSolicitacao']  == 'Problema de perda de backup/restore' ||
		$dados['tipoSolicitacao']  == 'Desenvolvimento de sistema' ||
		$dados['tipoSolicitacao']  == 'Desenvolvimento de Projeto de Outsourcing' ||
		$dados['tipoSolicitacao']  == 'Teste de sistema/software'
		
				) {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
		
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Innovatech',
		
					'recipient' => $dados['email'],
		
					"status" =>  $dados['status'],
		
					'priority' => $dados['prioridade']
		
			));		
		}
		else {
			$this->client->ticket ( $dados ['nTicket'] )->update ( array (
			
					'subject' => 	'Ticket:' . $dados['nTicket'] . ' - ' .
					$dados['tipoSolicitacao'] . ' - ' .
					'Cod.'. $dados['codCliente'] . ' - ' .
					$dados['cliente'],
			
					'recipient' => $dados['email'],
			
					"status" =>  $dados['status'],
			
					'priority' => $dados['prioridade']
			
			));
		}
		$this->session->set_flashdata('atualizaok','Ticket atualizado com sucesso!');	//variavel de direcionamento de url temporario
		redirect('CPrincipal/processaTicket');//redirecionando para a pagina de lista de usuarios
	}
}