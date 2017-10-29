<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $data= array();

        }




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
	public function index()
	{
        $data= array();
        $data=$this->Site_settings_model->admin_check($data);
         switch ($data['is_admin'])
            {
                case 0:
                    $this->load->view('welcome_message');
                break;
                case 1:
                     $this->load->view('/logged_in/welcome_message');
                break;
                case 2:
                    echo "not logged in";
                         redirect('/user/login_view/', 'refresh');
                break;
                case 3:
                    $this->load->view('/errors/account_suspended');
                    break;
                default:
                    echo "not logged in";
                         redirect('/user/user_logout/', 'refresh');
                    exit(1); // EXIT_ERROR
            }    
        }        
            
}
