<?php
	/**
	 * Created by PhpStorm.
	 * User: NicoMitov@MacBookAir
	 * Date: 21.08.18
	 * Time: 23:49
	 */

	class Events extends CI_Model {

		public function getEvents($case) {
			$date = date('Y-m-d');

			switch ($case) {
				case 'today':
					$query = $this->db->query('SELECT * FROM events WHERE date LIKE "%' . $date . '%" ORDER BY id DESC LIMIT 3');
					return $query->result_array();
				break;

				case 'old':
					$now = date('Y-m-d H:i:s');
					$query = $this->db->query('SELECT * FROM events WHERE date < "' . $now . '" AND date != "' . $date . '" ORDER BY id DESC LIMIT 3');
					return $query->result_array();
				break;

				case 'comming':
					$date = date('Y-m-d H:i:s');
					$query = $this->db->query('SELECT * FROM events WHERE date > "' . $date . '" ORDER BY id DESC LIMIT 3');
					return $query->result_array();
				break;
			}
		}

		public function getAllTodayEvents($date) {
			$query = $this->db->query('SELECT * FROM events WHERE date LIKE "%' . $date . '%" ORDER BY id DESC');
			return $query->result_array();
		}

		public function getAllPassedEvents($date) {
			$now = date('Y-m-d H:i:s');
			$query = $this->db->query('SELECT * FROM events WHERE date < "' . $now . '" AND date != "' . $date . '" ORDER BY id DESC');
			return $query->result_array();
		}

		public function getAllCommingEvents($date) {
			$query = $this->db->query('SELECT * FROM events WHERE date > "' . $date . '" ORDER BY id DESC');
			return $query->result_array();
		}

		public function addNewEvent($data) {
			$query = $this->db->query('INSERT INTO events SET id = NULL, name = "' . $data['name'] . '", location = "' . $data['location'] . '", date = "' . $data['date'] . '", url = "' . $data['url'] . '"');
			return $query ? true : false;
		}

	}
