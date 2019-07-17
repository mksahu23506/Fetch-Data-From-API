<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_Model extends CI_Model {

  //verify login details of Enterprise ,subenterprise , users.  short code///
	public function verifyLogin($userEmail=NULL,$userPassword=NULL)
	{
		$where = array(
			'userEmail'    => $userEmail,
			'userPassword' => md5($userPassword),
		);
		$this->db->where($where);
		$result = $this->db->get('users')->result();
		// echo '<pre>'; print_r($result); exit();
		return $result;
	}

}



/* End of file Common_Model.php */
/* Location: ./application/models/Common_Model.php */