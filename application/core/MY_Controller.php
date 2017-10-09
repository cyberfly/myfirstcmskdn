<?php 

class MY_Controller extends CI_Controller{

	public function __construct(){
		
		parent::__construct();

		//check logged in

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

		//get user info

		$this->the_user = $this->getUserInfo();
		// var_dump($this->the_user);
		// exit;

		//pass controller data to views

		$data = new stdClass();

		$data->the_user = $this->getUserInfo();

		$this->load->vars($data);

		//get current date time

		$this->current_datetime = date("Y-m-d H:i:s");

		//enable profiler

		// $this->output->enable_profiler(TRUE);

		//set language file to load

		$default_lang = 'malay';

		if ($this->session->userdata('user_language')) {
			
			$default_lang = $this->session->userdata('user_language');
		}

		$this->lang->load(array('site'), $default_lang);


	}

	public function getUserInfo(){

		$user = $this->ion_auth->user()->row();

		return $user;

	}

}




