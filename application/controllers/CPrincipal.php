<?php use Zendesk\API\Tickets;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CPrincipal extends CI_Controller {
	
	// carregando os helpes automatimamente para a classe especificada
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'form' ); 			// carregando funções de geração de forms
		$this->load->helper ( 'array' ); 			// carregando funções de geração de arrays
		$this->load->library ( 'form_validation' ); // carregando funções de validação do form
		$this->load->library ( 'session' ); 		// carregando funções de sessoes
		$this->load->library ( 'table' );	 		// carregando funções de tabela
		$this->load->model('ZendeskConnect');		//carregando model de conecção
	}
	
	//chamando tela principal
	public function index() {
		// dados que serão passados por parametro
		$dados = array (
				'titulo' => 'CRUD &raquo; Delete',
				'content' => ''
		);
		$this->load->view('index',$dados);
	}
	
	//chamando tela cadastro
	public function atualizarTicket() {		
		// dados que serão passados por parametro
		$dados = array (
				'titulo' => 'CRUD &raquo; Delete',
				'agents' => $this->ZendeskConnect->buscarAgents(),
				'content' => 'cadastro'
		);
		$this->load->view('index',$dados);
	}
	
	//processa informações
	public function processaTicket() {
		//validando informações
		$this->form_validation->set_rules('cliente','CLIENTE','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('telefone','TELEFONE','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('nTicket','NUMERO DO TICKET','trim|required|max_length[10]|ucwords');
		
		//verificando se o formulario passou
		if ($this->form_validation->run () == true) {
			//$tickets = $this->AtualizaTicket->procurarTicket();
			$dados = elements(
				array(
					'cliente',
					'email',
					'telefone',
					'setor',
					'codCliente',
					'serie',
					'tipoSolicitacao',
					'modelo',
					'nTicket',
					'equipamento',
					'notaFiscal',
					'atribuido',
					'status',
					'prioridade'),
				$this->input->post());	//criando um array e recuperando os dados do post vindo do formulario
			//passaando dados 
			$this->ZendeskConnect->atualizaTicket($dados);			
		}
		
		// dados que serão passados por parametro
		$dados = array (
				'titulo' => 'CRUD &raquo; Delete',
				'agents' => $this->ZendeskConnect->buscarAgents(),
				'content' => 'cadastro',
		);
		$this->load->view('index',$dados);
	}
}