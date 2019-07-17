<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_Model');
		if($this->session->userdata('loginData') != NULL)
		{
			redirect('Dashboard');
		}
	}

	public function index()
	{
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if($RequestMethod == 'POST')
		{
			$this->verifyLogin($this->input->post());
		}
		$content['subview'] = 'login';
		$this->load->view('main_layout',$content);
	}

	private function verifyLogin($data=NULL)
	{
		$userEmail    = $this->input->post('userEmail');
		$userPassword = $this->input->post('userPassword');
		$result       = $this->Common_Model->verifyLogin($userEmail,$userPassword);
		if(count($result) < 1)
		{
			$this->session->set_flashdata('er_msg', 'Invalid Details');
			redirect('Login');
		}
		else
		{
			// echo '<pre>'; print_r($result[0]); exit();
			$loginData = array(
				'user_id'   => $result[0]->user_id,
				'userName'  => $result[0]->userName,
				'userEmail' => $result[0]->userEmail,
			);
			$this->session->set_userdata('loginData',$loginData);
			redirect('Dashboard');
		}
	}
	
	public function logOut()
	{
		session_destroy();
		redirect(base_url());
	}

}
