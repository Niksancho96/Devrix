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

		$data['today']     = $this->addGoogleMapsLinkToArray($data['today']);
		$data['old']     = $this->addGoogleMapsLinkToArray($data['old']);
		$data['comming']     = $this->addGoogleMapsLinkToArray($data['comming']);

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
		if ($this->input->method(TRUE) == 'POST') {
			$create = [
				'name'     => $this->input->post('name'),
				'location' => $this->input->post('location'),
				'date'     => $this->input->post('date'),
				'url'      => $this->input->post('url')
			];

			$creation = $this->events->addNewEvent($create);
			if ($creation) {
				$data['post_result'] = true;
			} else {
				$data['post_result'] = false;
			}
		}

		$data['title'] = 'Event Lister - Create Event';
		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('new', $data);
		$this->load->view('partials/footer');
	}

	public function googleMapsLink($location) {
		$url     = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
		$address = urlencode($location);
		$request = file_get_contents($url . $address);
		$result  = json_decode($request, true);
		$lat     = $result['results'][0]['geometry']['location']['lat'];
		$lon     = $result['results'][0]['geometry']['location']['lng'];

		return 'https://www.google.com/maps/search/?api=1&query=' . $lat . ',' . $lon;
	}

	public function addGoogleMapsLinkToArray($array) {
		foreach ($array as $element) {
			$element['location'] = [
				'address' => $element['location'],
				'link'    => $this->googleMapsLink($element['location'])
			];
		}
	}

	public function test() {
		echo '<pre>';

		var_dump($this->googleMapsLink('ж.к. Студентски град 4'));
	}
}
