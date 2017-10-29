<?php
class Site_settings_model extends CI_Model 
{
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
public function admin_check($data)
        {
            //$data['is_admin'] 0=normal, 1=admin, 2=not logged in, 3=suspended;
           
            if(array_key_exists('user_email', $_SESSION))
                {
                $email = $_SESSION['user_email'];
                }
            else
                {
                $email = "";  
                }
            
            
            
            
            if($email)
            {
                //logged in checking if active
                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('user_email',$email);
                $this->db->where('is_active',1);
                $query=$this->db->get();               
                if($query->num_rows()>0)
                    {
                        //is active, check if admin
                        $this->db->select('*');
                        $this->db->from('user');
                        $this->db->where('user_email',$email);
                        $this->db->where('is_admin',1);
                        $query=$this->db->get();
                        if($query->num_rows()>0)
                            {
                                //is admin
                                $data['is_admin']=1;
                            }
                            else
                            {
                                //is NOT admin
                                $data['is_admin']=0;
                            }
                    }
                    else
                    {
                       //not active
                       $data['is_admin']=3;
                    }
            }
            else
            {
                //not logged in    
                $data['is_admin']=2;
            }
            return $data;
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