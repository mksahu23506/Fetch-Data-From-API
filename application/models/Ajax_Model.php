<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_Model extends CI_Model {

  // public function __construct()
  // {
  //  parent::__construct();
  //  $this->load->model('Common_Model');
  // }

  //it is use data into  Downloading file///
	public function resultToArray($query=NULL)
	{	
		$result = $this->db->query($query)->result_array();  
		// print_r($this->db->last_query()); exit(); 
		return $result;
	}
  // insert bulk  data//
	public function insertBulk($tableName=NULL,$data=NULL)
	{
		$result = $this->db->insert_batch($tableName,$data);
		if($result > 0)
		{
			$return = 'success';
			return $return;
		}
	}
}



/* End of file Common_Model.php */
/* Location: ./application/models/Common_Model.php */