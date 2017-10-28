<?php
class System_model extends CI_Model 
{
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
        
      
function get_parameters($type)
	{
		$query = $this->db->where('Type',$type);
		$query = $this->db->get('parameters');
		return $query->result();
                $type = null;
	}
function parameters_compile($copy,$table)
	{
		$copy['links']="";
		//loading parameters - into variable parameters
		if($query = $this->get_parameters($table))
		{
			$copy['parameters']=$query;
		}
		$parameters=$copy['parameters']; 
		if(isset($parameters)) : foreach($parameters as $row) :
		{
//setting variable for each parameter 
			$copy[$row->Parameter]= $row->Setting;
		}
		endforeach; 
		endif;
                $table = null;
                $query = null;
		Return $copy;
	}
}