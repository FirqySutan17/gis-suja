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
		$data['title'] = 'GIS SUJA';
		$data['user'] = $this->session_data['user'];
		$data['gisite'] = $this->datatable(); // perbaikan: kirim 2 parameter
		// dd($data['gisite']);
		$this->template->_v('site/index', $data);
	}

	public function create_site() {
		$data['title'] 				= 'GIS SUJA';
		$data['user']				= $this->session_data['user'];
		// $data['customer'] 			= $this->datatable_cust();

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
		// $data['customer']    = $this->datatable_cust();

		// Ambil data TB_PLAN berdasarkan ACTIVITY_NO
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

	private function datatable()
	{
		$query = "
			SELECT * FROM
			GIS_SITE
		";

		$main_data = $this->db->query($query)->result_array();

		return array_values($main_data);
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