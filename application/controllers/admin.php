<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('admin_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');
		}

		$data['title'] = 'Upload Photos | Akij Ceramics Ltd';
		$data['css'] = $this->tank_auth->load_css(array('fileupload/jquery.fileupload-ui.css'));
		$data['fjs'] = $this->tank_auth->load_js(array('fileupload/jquery.ui.widget.js','fileupload/jquery.iframe-transport.js','fileupload/jquery.fileupload.js','admin/home.js'));


		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/admin', $data);
		$this->load->view('common/footer_admin', $data);
	}

	function tiles()
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');
		}

		$data['tiles'] = $this->admin_model->get_all_tiles();

		$data['title'] = 'Tiles | Akij Ceramics Ltd';

		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/tiles/tiles', $data);
		$this->load->view('common/footer_admin', $data);
	}

	function add_tiles()
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');
		}

		$data['tiles_size_list'] = $this->admin_model->get_all_tiles_size();
		$data['tiles_cat_list'] = $this->admin_model->get_all_tiles_cat();

		$this->form_validation->set_rules('tiles_code', 'Tiles Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_type', 'Tiles Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_cat', 'Tiles Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_size', 'Tiles Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_price', 'Tiles Price', 'trim|required|xss_clean');

		$data['errors'] = array();
		$data['tiles_code_error'] = '';

		if ($this->form_validation->run()) 
		{																	// validation ok
			$data['data'] = array(
				'tiles_code'	=> $this->input->post('tiles_code'),
				'tiles_type'	=> $this->input->post('tiles_type'),
				'tiles_cat'		=> $this->input->post('tiles_cat'),
				'tiles_size'	=> $this->input->post('tiles_size'),
				'tiles_price'	=> $this->input->post('tiles_price')
			);

			if ($id = $this->admin_model->add_tiles($data['data'])) 
			{															// success					
				redirect('/admin/tiles/edit/'.$id);
			} 
		}
		else
		{
			if($this->input->post('tiles_price') != "" && $this->input->post('tiles_code') == "")
				$data['tiles_code_error'] = 'Please, choose a tiles image.';
		}

		$data['title'] = 'Add Tiles | Akij Ceramics Ltd';
		$data['css'] = $this->tank_auth->load_css(array('fileupload/jquery.fileupload-ui.css'));
		$data['fjs'] = $this->tank_auth->load_js(array('fileupload/jquery.ui.widget.js','fileupload/jquery.iframe-transport.js','fileupload/jquery.fileupload.js','admin/tiles/add_tiles.js'));

		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/tiles/add_tiles', $data);
		$this->load->view('common/footer_admin', $data);
	}

	function edit_tiles($tiles_id)
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login');
		}

		if(!$tiles_id) {
			redirect('/admin/tiles');
		}

		$data['row'] = NULL;

		$data['tiles_size_list'] = $this->admin_model->get_all_tiles_size();
		$data['tiles_cat_list'] = $this->admin_model->get_all_tiles_cat();

		if($this->input->server('REQUEST_METHOD') != 'POST')
		{
			if($data['row'] = $this->admin_model->get_tiles($tiles_id))
				$data['row'] = $data['row'];
			else
				redirect('/admin/tiles');
		}

		$this->form_validation->set_rules('tiles_code', 'Tiles Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_type', 'Tiles Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_cat', 'Tiles Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_size', 'Tiles Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tiles_price', 'Tiles Price', 'trim|required|xss_clean');

		$data['errors'] = array();
		$data['tiles_code_error'] = '';

		if ($this->form_validation->run()) 
		{																	// validation ok
			$data['data'] = array(
				'tiles_code'	=> $this->input->post('tiles_code'),
				'tiles_type'	=> $this->input->post('tiles_type'),
				'tiles_cat'		=> $this->input->post('tiles_cat'),
				'tiles_size'	=> $this->input->post('tiles_size'),
				'tiles_price'	=> $this->input->post('tiles_price')
			);

			if ($id = $this->admin_model->update_tiles($data['data'], $tiles_id)) 
			{																// success					
				redirect('/admin/tiles/edit/'.$id);
			} 
		}
		else
		{
			if($this->input->post('tiles_price') != "" && $this->input->post('tiles_code') == "")
				$data['tiles_code_error'] = 'Please, choose a tiles image.';
		}

		$data['title'] = 'Edit Tiles | Akij Ceramics Ltd';
		$data['css'] = $this->tank_auth->load_css(array('fileupload/jquery.fileupload-ui.css'));
		$data['fjs'] = $this->tank_auth->load_js(array('fileupload/jquery.ui.widget.js','fileupload/jquery.iframe-transport.js','fileupload/jquery.fileupload.js','admin/tiles/edit_tiles.js'));

		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/tiles/edit_tiles', $data);
		$this->load->view('common/footer_admin', $data);
	}

	function rooms()
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');
		}

		$data['rooms'] = $this->admin_model->get_all_rooms();

		$data['title'] = 'Rooms | Akij Ceramics Ltd';

		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/rooms/rooms', $data);
		$this->load->view('common/footer_admin', $data);
	}

	function add_rooms()
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');
		}

		$this->form_validation->set_rules('rooms_code', 'Rooms Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rooms_type', 'Rooms Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rooms_support_floor', 'Rooms Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rooms_support_wall', 'Rooms Price', 'trim|required|xss_clean');

		$data['errors'] = array();
		$data['rooms_code_error'] = '';

		if ($this->form_validation->run()) 
		{																	// validation ok
			$data['data'] = array(
				'room_code'	=> $this->input->post('rooms_code'),
				'room_type'	=> $this->input->post('rooms_type'),
				'room_support_floor'	=> $this->input->post('rooms_support_floor'),
				'room_support_wall'	=> $this->input->post('rooms_support_wall')
			);

			if ($id = $this->admin_model->add_rooms($data['data'])) 
			{															// success					
				redirect('/admin/rooms/edit/'.$id);
			} 
		}
		else
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if($this->input->post('rooms_code') == "")
					$data['rooms_code_error'] = 'Please, choose a room image.';
			}
		}

		$data['title'] = 'Add Rooms | Akij Ceramics Ltd';
		$data['css'] = $this->tank_auth->load_css(array('fileupload/jquery.fileupload-ui.css'));
		$data['fjs'] = $this->tank_auth->load_js(array('fileupload/jquery.ui.widget.js','fileupload/jquery.iframe-transport.js','fileupload/jquery.fileupload.js','admin/rooms/add_rooms.js'));

		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/rooms/add_rooms', $data);
		$this->load->view('common/footer_admin', $data);
	}

	function edit_rooms($rooms_id)
	{
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login');
		}

		if(!$rooms_id) {
			redirect('/admin/rooms');
		}

		$data['row'] = NULL;

		if($this->input->server('REQUEST_METHOD') != 'POST')
		{
			if($data['row'] = $this->admin_model->get_rooms($rooms_id))
				$data['row'] = $data['row'];
			else
				redirect('/admin/rooms');
		}

		$this->form_validation->set_rules('rooms_code', 'Rooms Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rooms_type', 'Rooms Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rooms_support_floor', 'Rooms Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rooms_support_wall', 'Rooms Price', 'trim|required|xss_clean');

		$data['errors'] = array();
		$data['rooms_code_error'] = '';

		if ($this->form_validation->run()) 
		{																	// validation ok
			$data['data'] = array(
				'room_code'	=> $this->input->post('rooms_code'),
				'room_type'	=> $this->input->post('rooms_type'),
				'room_support_floor'	=> $this->input->post('rooms_support_floor'),
				'room_support_wall'	=> $this->input->post('rooms_support_wall')
			);

			if ($id = $this->admin_model->update_rooms($data['data'], $rooms_id)) 
			{																// success					
				redirect('/admin/rooms/edit/'.$id);
			} 
		}
		else
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				if($this->input->post('rooms_code') == "")
					$data['rooms_code_error'] = 'Please, choose a room image.';
			}
		}

		$data['title'] = 'Edit Rooms | Akij Ceramics Ltd';
		$data['css'] = $this->tank_auth->load_css(array('fileupload/jquery.fileupload-ui.css'));
		$data['fjs'] = $this->tank_auth->load_js(array('fileupload/jquery.ui.widget.js','fileupload/jquery.iframe-transport.js','fileupload/jquery.fileupload.js','admin/rooms/edit_rooms.js'));

		$data['logged_in'] = 1;

		$this->load->view('common/header', $data);
		$this->load->view('common/header_admin', $data);
		$this->load->view('admin/rooms/edit_rooms', $data);
		$this->load->view('common/footer_admin', $data);
	}
	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */