<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		if($this->session->userdata('loginData') == NULL)
		{
			$this->session->set_flashdata('er_msg', 'You need to login to see the dashboard');
			redirect('Login');
		}
	}

	public function index()
	{
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if($RequestMethod == 'POST')
		{
			echo "<pre>"; print_r($this->input->post()); exit();
		}
		$content['subview'] = 'dashboard';
		$this->load->view('main_layout',$content);
	}

	public function getApiData()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => "https://api.spacexdata.com/v3/launches/upcoming",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "GET",
		));

		$response = curl_exec($curl);
		$err      = curl_error($curl);

		curl_close($curl);

		if($err)
		{
			// echo "cURL Error #:" . $err;
			// uncomment the above line if there is any error to check and fix
			echo "ERROR";
		}
		else
		{
			echo $response;
		}
	}

	public function logOut()
	{
		session_destroy();
		redirect(base_url());
	}
}
