<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Gis extends CI_Controller {
	var $menu_id 	= "";
	var $menu_id2 	= "";
	var $session_data = "";
	var $menu_ids = [];
	public function __Construct() {
		parent::__construct();
		$this->menu_id 		= 'GIS001';
		$this->menu_id2 	= 'GIS002';
		$this->menu_ids = ['GIS001', 'GIS002'];
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('sales');
		$this->load->library('upload');
	}

  	public function index_site()
	{
		$class = "*";
		$ownership = "*";
		
		
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$class 	= $this->input->post('class');
			$ownership 	= $this->input->post('ownership');
		}

		$filter = [
			'class'	=> $class,
			'ownership'	=> $ownership
		];

		$data['title'] = 'GIS SUJA';
		$data['user'] = $this->session_data['user'];
		$data['gisite'] = $this->datatable($filter);
		$data['class']	= $this->getClass();
		$data['ownership']	= $this->getOwnership();
		$data['filter'] = $filter;

		$this->template->_v('site/index', $data);
	}

	public function create_site() {
		$data['title'] 				= 'GIS SUJA';
		$data['user']				= $this->session_data['user'];
		$data['region']				= $this->getRegion();
		$data['city']				= $this->getCity();
		$data['class']				= $this->getClass();
		$data['ownership']			= $this->getOwnership();

		$this->template->_v('site/create', $data);
	}

	public function save_site()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$this->load->helper('date');

			$now  = date('Y-m-d H:i:s');
			$user = $this->session_data['user']['EMPLOYEE_ID'];

			try {
				$data = [
					'REGION'     => $post['region'],
					'CITY'       => $post['city'],
					'CLASS'      => $post['class'],
					'OWNERSHIP'  => $post['owner'],
					'NAME'       => $post['name'],
					'COORDINATE' => $post['coordinate'],
					'ADDRESS'    => $post['address'],
					'CAPACITY'   => $post['capacity'],
					'LINK_GMAPS' => $post['link_gmaps'],
				];

				$insert = $this->db->insert('GIS_SITE', $data);

				if (!$insert) {
					throw new Exception("GAGAL MENYIMPAN DATA GIS SITE");
				}

				$this->session->set_flashdata('success', 'DATA BERHASIL TERSIMPAN.');
				redirect('dashboard/gis/site');
			} catch (Exception $e) {
				log_message('error', $e->getMessage());
				$this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
				redirect('dashboard/gis/site');
			}
		}

		$this->session->set_flashdata('error', 'Akses tidak valid.');
		redirect('dashboard/gis/site');
	}

	public function delete_site($id)
	{
		// Terakhir hapus dari TB_PLAN
		$this->db->where('ID', $id);
		$this->db->delete('GIS_SITE');

		$this->session->set_flashdata('success', 'DATA BERHASIL TERHAPUS.');
		redirect('dashboard/gis/site');
	}

	public function edit_site($id) {
		$data['title']       = 'GIS - SITE';
		$data['user']        = $this->session_data['user'];
		$data['region']				= $this->getRegion();
		$data['city']				= $this->getCity();
		$data['class']				= $this->getClass();
		$data['ownership']			= $this->getOwnership();

		$this->db->where('ID', $id);
		$data['site'] = $this->db->get('GIS_SITE')->row_array();

		$this->template->_v('site/edit', $data);
	}

	public function update_site()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$this->load->helper('date');

			$now  = date('Y-m-d H:i:s');
			$user = $this->session_data['user']['EMPLOYEE_ID'];

			try {
				if (empty($post['id'])) {
					throw new Exception("ID tidak ditemukan untuk update.");
				}

				$data = [
					'REGION'     => $post['region'],
					'CITY'       => $post['city'],
					'CLASS'      => $post['class'],
					'OWNERSHIP'  => $post['owner'],
					'NAME'       => $post['name'],
					'COORDINATE' => $post['coordinate'],
					'ADDRESS'    => $post['address'],
					'CAPACITY'   => $post['capacity'],
					'LINK_GMAPS' => $post['link_gmaps']
				];

				$this->db->where('ID', $post['id']);
				$update = $this->db->update('GIS_SITE', $data);

				if (!$update) {
					throw new Exception("GAGAL MENGUPDATE DATA GIS SITE");
				}

				$this->session->set_flashdata('success', 'DATA BERHASIL DIPERBARUI.');
				redirect('dashboard/gis/site');

			} catch (Exception $e) {
				log_message('error', $e->getMessage());
				$this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
				redirect('dashboard/gis/site');
			}
		}

		$this->session->set_flashdata('error', 'Akses tidak valid.');
		redirect('dashboard/gis/site');
	}

	private function datatable($filter)
	{
		$where_clauses = [];

		if ($filter['class'] != '*') {
			$where_clauses[] = "CLASS = '" . $filter['class'] . "'";
		}

		if ($filter['ownership'] != '*') {
			$where_clauses[] = "OWNERSHIP = '" . $filter['ownership'] . "'";
		}

		$site_filter = '';
		if (!empty($where_clauses)) {
			$site_filter = ' WHERE ' . implode(' AND ', $where_clauses);
		}

		$query = "
			SELECT * FROM GIS_SITE
			$site_filter
		";

		$main_data = $this->db->query($query)->result_array();

		return array_values($main_data);
	}

	private function getRegion($key = "")
	{
		$list = [
			"JAVA"				=> "JAVA",
			"JAWA & SUMATRA"	=> "JAWA & SUMATRA",
			"BALI"				=> "BALI",
			"KALIMANTAN"		=> "KALIMANTAN",
			"SUMATRA"			=> "SUMATRA"
		];

		if (!empty($key)) {
			return !empty($list[$key]) ? $list[$key] : "N/A";
		}

		return $list;
	}

	private function getCity($key = "")
	{
		$list = [
			"BANDUNG"			=> "BANDUNG",
			"BANDUNG BARAT"		=> "BANDUNG BARAT",
			"BANYUMAS"			=> "BANYUMAS",
			"BEKASI"			=> "BEKASI",
			"BOGOR"				=> "BOGOR",
			"BOYOLALI"			=> "BOYOLALI",
			"CIAMIS"			=> "CIAMIS",
			"CIANJUR"			=> "CIANJUR",
			"CIREBON"			=> "CIREBON",
			"DELI SERDANG"		=> "DELI SERDANG",
			"JOMBANG"			=> "JOMBANG",
			"KALIJATI"			=> "KALIJATI",
			"KAMPAR"			=> "KAMPAR",
			"KUNINGAN"			=> "KUNINGAN",
			"LAMPUNG SELATAN"	=> "LAMPUNG SELATAN",
			"MALANG"			=> "MALANG",
			"MOJOKERTO"			=> "MOJOKERTO",
			"PANDEGLANG"		=> "PANDEGLANG",
			"PASURUAN"			=> "PASURUAN",
			"PURWAKARTA"		=> "PURWAKARTA",
			"SAMARINDA"			=> "SAMARINDA",
			"SUBANG"			=> "SUBANG",
			"SUKABUMI"			=> "SUKABUMI",
			"SUKOHARJO"			=> "SUKOHARJO",
			"SURABAYA"			=> "SURABAYA",
			"TABANAN"			=> "TABANAN",
			"TANAH LAUT"		=> "TANAH LAUT",
			"TANJUNG JABUNG TIMUR"	=> "TANJUNG JABUNG TIMUR",
			"TASIKMALAYA"		=> "TASIKMALAYA",
			"TEGAL"				=> "TEGAL",
			"WONOGIRI"			=> "WONOGIRI"
		];

		if (!empty($key)) {
			return !empty($list[$key]) ? $list[$key] : "N/A";
		}

		return $list;
	}

	private function getClass($key = "")
	{
		$list = [
			"GPS"			=> "GPS",
			"PS"		=> "PS",
			"BROILER"			=> "BROILER",
			"HATCHERY"	=> "HATCHERY",
			"LAB"	=> "LAB",
			"MEAT CENTER"	=> "MEAT CENTER",
			"RPA"	=> "RPA"
		];

		if (!empty($key)) {
			return !empty($list[$key]) ? $list[$key] : "N/A";
		}

		return $list;
	}

	private function getOwnership($key = "")
	{
		$list = [
			"JV (CJ PIA)"			=> "JV (CJ PIA)",
			"KEMITRAAN"		=> "KEMITRAAN",
			"OWN (SUJA)"			=> "OWN (SUJA)",
			"SEWA"	=> "SEWA"
		];

		if (!empty($key)) {
			return !empty($list[$key]) ? $list[$key] : "N/A";
		}

		return $list;
	}

	private function cekLogin() 
	{
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		$menu_access = $this->menu_ids;
		$check_exist = array_intersect($menu_access, $user_access);
		// dd($check_exist);
		if (empty($check_exist) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}