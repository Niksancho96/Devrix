<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('events');
	}

	public function index() {
		$data['title']     = 'Event Lister - Index';
		$data['today']     = $this->addGoogleMapsLinkToArray($this->events->getEvents('today'));
		$data['old']       = $this->addGoogleMapsLinkToArray($this->events->getEvents('old'));
		$data['comming']   = $this->addGoogleMapsLinkToArray($this->events->getEvents('comming'));

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('index', $data);
		$this->load->view('partials/footer');
	}

	public function today() {
		$date              = date('Y-m-d');
		$data['title']     = 'Event Lister - Today\'s Events';
		$data['today']     = $this->addGoogleMapsLinkToArray($this->events->getAllTodayEvents($date));
		$data['today']     = $this->addGoogleCalendarLinkToArray($data['today']);

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('today', $data);
		$this->load->view('partials/footer');
	}

	public function passed() {
		$date              = date('Y-m-d');
		$data['title']     = 'Event Lister - Passed Events';
		$data['passed']    = $this->addGoogleMapsLinkToArray($this->events->getAllPassedEvents($date));

		$this->parser->parse('partials/header', $data);
		$this->load->view('partials/header', $data);
		$this->load->view('passed', $data);
		$this->load->view('partials/footer');
	}

	public function comming() {
		$date              = date('Y-m-d');
		$data['title']     = 'Event Lister - Up Comming Events';
		$data['comming']   = $this->addGoogleMapsLinkToArray($this->events->getAllCommingEvents($date));
		$data['comming']   = $this->addGoogleCalendarLinkToArray($data['comming']);

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
		$prepLocation = str_replace(' ', '+', $location);
		return 'https://www.google.bg/maps/place/' . $prepLocation;
	}

	public function addGoogleMapsLinkToArray($array) {
		foreach ($array as &$element) {
			$element['location'] = [
				'address' => $element['location'],
				'link'    => $this->googleMapsLink($element['location'])
			];
		}

		return $array;
	}

	public function googleCalendarLink($name, $location, $startDate) {
		$startDate = str_replace(' ', 'T', date('Ymd His', strtotime($startDate)));
		$dates     = $startDate . 'Z/' . $startDate . 'Z';

		$name      = $name ? str_replace(' ', '+', $name) : "";
		$location  = $location ? str_replace(' ', '+', $location) : "";

		$googleCalendarUrl = 'https://www.google.com/calendar/render?action=TEMPLATE&text=' . $name . '&dates=' . $dates . '&location=' . $location . '&sf=true&output=xml';

		return $googleCalendarUrl;
	}

	public function addGoogleCalendarLinkToArray($array) {
		foreach ($array as &$element) {
			$element['google_calendar'] = $this->googleCalendarLink($element['name'], $element['location'], $element['date']);
		}

		return $array;
	}
}
