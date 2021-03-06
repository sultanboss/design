<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('admin_model');
	}

	function index()
	{
		$data['js'] = $this->tank_auth->load_js(array('jquery.queryloader2.js', 'chardinjs.min.js'));
		$data['css'] = $this->tank_auth->load_css(array('chardinjs.css'));	

		$data['floors_category'] = $this->admin_model->get_tiles_category_count('Floors');
		$data['walls_category'] = $this->admin_model->get_tiles_category_count('Walls');

		$data['border_tiles'] = $this->admin_model->get_all_border_tiles();

		$data['walls'] = $this->admin_model->get_category_tiles('Walls');		
		$i = 0;
		foreach ($data['walls'] as $key => $value) {
			$ar = $this->calculate_process($value['tiles_code']);
			$data['walls'][$i]['supported_tiles'] = $ar; 
			$i++;
		}
		
		$data['floors'] = $this->admin_model->get_category_tiles('Floors');
		$i = 0;
		foreach ($data['floors'] as $key => $value) {
			$ar = $this->calculate_process($value['tiles_code']);
			$data['floors'][$i]['supported_tiles'] = $ar; 
			$i++;
		}

		$data['rooms'] = $this->admin_model->get_all_rooms();
		$data['rooms_type'] = $this->admin_model->get_all_rooms_type();

		$data['title'] = 'Live Demo - Akij Ceramics Ltd';
		$data['fjs'] = $this->tank_auth->load_js(array('welcome/welcome.js'));	

		$this->load->view('common/header', $data);
		$this->load->view('welcome', $data);
		$this->load->view('common/footer', $data);
	}

	function calculate_process($tiles)
	{
		$dir = 'uploads/files/rooms_thumb/';
		$files = scandir($dir, 1);

		$ar = array();

        $arz = explode("_",$tiles);
        if(count($arz) > 1)
        {
        	$tiles = $arz[1].'_'.$arz[2].'_'.$arz[3].'_'.$arz[4];
        }

		$i = 0;
		foreach ($files as $key => $value) {
			if((strpos($value, '_'.$tiles)) && (substr($value, 1, 1) != '_'))
			{
				if(strpos($value, '_0_'))
				{
					$ar[$i]['tiles'] = 'wall';
				}
				else
				{
					if(substr($value, -6) == '_0.jpg')
						$ar[$i]['tiles'] = 'floor';
					else
					{
						$ar[$i]['tiles'] = 'wall floor';
					}
				}
				$ar[$i]['room'] = substr($value, 0, strpos($value, '_'));
				$i++;
			}			
		}
		return $ar;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */