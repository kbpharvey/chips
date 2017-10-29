<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site_admin extends CI_Controller {
public function __construct()
        {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('Grocery_CRUD');
        $this->load->database();
$this->load->helper('url');
        $data= array();
        }

    public function index()
    {
        $this->param();
    }        

    
    
    
    public function param()
    {
            $data= array();
            $data=$this->Site_settings_model->admin_check($data);
            $data=$this->Site_settings_model->parameters_compile($data,'COPY');
     
        $this->load->view("header.php",$data);
        switch ($data['is_admin'])
            {
                case 0:
                    $this->load->view('welcome_message',$data);
                break;
                case 1:
                $crud = new Grocery_CRUD();
                $crud->set_table('parameters');
                $output = $crud->render();
                $this->load->view('/logged_in/admin.php',$output);  
                break;
                case 2:
//                    echo "not logged in";
                         redirect('/user/login_view/', 'refresh');
                break;
                case 3:
//                    echo "showing suspended";
                    $this->load->view('/errors/account_suspended');
                    break;
                default:
//                    echo "not logged in";
                         redirect('/user/user_logout/', 'refresh');
                    exit(1); // EXIT_ERROR
            }  
            
    }
    
        public function user()
    {
            $data= array();
            $data=$this->Site_settings_model->admin_check($data);
            $data=$this->Site_settings_model->parameters_compile($data,'COPY');
     
        $this->load->view("header.php",$data);
        switch ($data['is_admin'])
            {
                case 0:
                    $this->load->view('welcome_message',$data);
                break;
                case 1:
                $crud = new Grocery_CRUD();
                $crud->set_table('user');
                $output = $crud->render();
                $this->load->view('/logged_in/admin.php',$output);  
                break;
                case 2:
//                    echo "not logged in";
                         redirect('/user/login_view/', 'refresh');
                break;
                case 3:
//                    echo "showing suspended";
                    $this->load->view('/errors/account_suspended');
                    break;
                default:
//                    echo "not logged in";
                         redirect('/user/user_logout/', 'refresh');
                    exit(1); // EXIT_ERROR
            }  
            
    }
 
    
}
