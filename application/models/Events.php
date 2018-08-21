<?php
	/**
	 * Created by PhpStorm.
	 * User: NicoMitov@MacBookAir
	 * Date: 21.08.18
	 * Time: 23:49
	 */

	class Events extends CI_Model {

		public function getEvents($case) {
			switch ($case) {
				case 'today':
					$date = date('Y-m-d');
					$query = $this->db->query('SELECT * FROM events WHERE date LIKE "%' . $date . '%" ORDER BY id DESC LIMIT 3');
					return $query->result_array();
				break;

				case 'old':
					$date = date('Y-m-d H:i:s');
					$query = $this->db->query('SELECT * FROM events WHERE date < "' . $date . '" ORDER BY id DESC LIMIT 3');
					return $query->result_array();
				break;

				case 'comming':
					$date = date('Y-m-d H:i:s');
					$query = $this->db->query('SELECT * FROM events WHERE date > "' . $date . '" ORDER BY id DESC LIMIT 3');
					return $query->result_array();
				break;
			}
		}

	}
