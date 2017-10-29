<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Site_settings extends CI_Controller {
    

function __construct()
{
        parent::__construct();

 
/* Standard Libraries */

$copy = array();


//$this->load->model('System_model');
//		$this->load->model('user_model');

//compiling all copy as parameters with name of $ and "parameter" field

/* ------------------ */    
 
//$this->load->library('Grocery_CRUD');    
}
 
function _admin_output($output = null,$a = null)

{
//            $copy = $this->System_model->parameters_compile($copy,'COPY');
            $this->load->view('header',$copy);
            if(isset($a['admin'])) {
                    $this->load->view('admin_error_view.php',$copy);
		} 
                else {

                    $this->load->view('admin_view.php',$output); 
                }
            $this->load->view('footer',$copy); 
} 
public function users()
        {
            $output = array();
            
            
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && ($_SESSION['is_admin'] == 1)) {

        //load our Nativesession library
        $this->load->library( 'nativesession' );		

        //Read the username from session
        $username = $this->nativesession->get( 'is_admin' );
            }
        
        if ($username == 1) {
            echo "admin user";
            $crud = new Grocery_CRUD();
            $crud->set_table('users');
            $output = $crud->render(); 
            } else {
                echo "NOT admin user";
//		not logged in as admin
            $a = array("admin" => "no");
            }
            $this->_admin_output($output,$a);
        }

public function copy()
{
        {
    echo '<pre>'; print_r($_SESSION); echo '</pre>';
            $output = array();
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && ($_SESSION['is_admin'] === TRUE)) {
                echo "logged in";
                        $crud = new Grocery_CRUD();
                        $crud->set_table('parameters');
                        $output = $crud->render(); 
                        

            } else {

//                  not logged in as admin
                echo "NOT logged in";
                    $a = array("admin" => "no");
            }
            $this->_admin_output($output,$a);

            }

}

public function index()
{
        {
                echo '<pre>'; print_r($this->session->userdata); echo '</pre>';   	
            $output = array();
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && ($_SESSION['is_admin'] == 1)) {
                        $crud = new Grocery_CRUD();
                        $crud->set_table('parameters');
                        $output = $crud->render(); 
                        

            } else {

//			not logged in as admin

    $a = array("admin" => "no");
            }
            $this->_admin_output($output,$a);

            }

}

}
    
