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
		$this->load->view('index', $data);
		$this->load->view('partials/footer');
	}

	public function today() {
		$date              = date('Y-m-d');
		$data['title']     = 'Event Lister - Today\'s Events';
		$data['today']     = $this->events->getAllTodayEvents($date);

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('today', $data);
		$this->load->view('partials/footer');
	}

	public function passed() {
		$date              = date('Y-m-d');
		$data['title']     = 'Event Lister - Passed Events';
		$data['passed']     = $this->events->getAllPassedEvents($date);

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('passed', $data);
		$this->load->view('partials/footer');
	}

	public function comming() {
		$date              = date('Y-m-d');
		$data['title']     = 'Event Lister - Up Comming Events';
		$data['comming']     = $this->events->getAllCommingEvents($date);

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('comming', $data);
		$this->load->view('partials/footer');
	}

	public function create() {
		$data['title'] = 'Event Lister - Create Event';
		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('new', $data);
		$this->load->view('partials/footer');
	}

	public function test() {
		echo '<pre>'; var_dump();
	}
}
