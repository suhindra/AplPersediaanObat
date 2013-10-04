<?php

class Page extends CI_Controller {

	function home() {
		
		$this->load->view('loading') ;
		$this->load->view('left') ;
		$this->load->view('header'); 
		$this->load->view('javascript'); 
		$this->load->view('footer');
	
			}

}

