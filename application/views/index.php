<?php 
$this->load->view('includes/header');

if($content == '') {
	$this->load->view('includes/content');
}
else {
	$this->load->view('nav/' . $content);
}

$this->load->view('includes/footer');