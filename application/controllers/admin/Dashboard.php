<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->cekLogin();
		$this->session_data = $this->session->userdata('user_dashboard');
	}

	public function index() {
		$data['title'] = 'DASHBOARD';
		$data['user']  = $this->session_data['user'];

		$this->template->_v('index', $data);
	}

	private function cekLogin() {
		$session = $this->session->userdata('user_dashboard');
		if (empty($session)) {
			redirect('login_dashboard');
		}
	}
}
