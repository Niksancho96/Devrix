<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('events');
	}

	public function index() {
		$data['title']     = 'Event Lister - Index';
		$data['today']     = $this->events->getEvents('today');
		$data['old']       = $this->events->getEvents('old');
		$data['comming']   = $this->events->getEvents('comming');

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('welcome_message', $data);
		$this->load->view('partials/footer');
	}

	public function test() {
		echo '<pre>'; var_dump();
	}
}
