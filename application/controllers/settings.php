<?php
class Settings extends CI_Controller
{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	function index()
	{
		$data = array();
                //compiling all records in paramaeters table as parameters with name of $ and "parameter" field
		$this->load->model('settings_model');
                //compiling all records in paramaeters table as parameters with name of $ and "parameter" field
 
        }
	function parameters()
	{
		$this->index();
	}
}
