<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth');
	}

	function index()
	{
		$data['title'] = 'Akij Ceramics';
		$data['fjs'] = $this->tank_auth->load_js(array('welcome/welcome.js'));		
		$this->load->view('common/header', $data);
		$this->load->view('welcome');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */