<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}

public function index()
{
    $this->login_view();
}
public function register()
        {
           $data= array();
           $data=$this->Site_settings_model->admin_check($data);
           $data=$this->Site_settings_model->parameters_compile($data,'COPY');

           $this->load->view("header.php",$data);
           $this->load->view("register.php",$data);
           $this->load->view("footer.php",$data);
        }

public function register_user(){

      $user=array(
      'user_name'=>$this->input->post('user_name'),
      'user_email'=>$this->input->post('user_email'),
      'user_password'=>md5($this->input->post('user_password')),
      'user_age'=>$this->input->post('user_age'),
      'user_mobile'=>$this->input->post('user_mobile')
        );

      $email_check=$this->user_model->email_check($user['user_email']);

      if($email_check){
  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('User/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
  redirect('User');


}

}

public function login_view(){
           $data= array();
           $data=$this->Site_settings_model->admin_check($data);
           $data=$this->Site_settings_model->parameters_compile($data,'COPY');
           $this->load->view("header.php",$data);
        switch ($data['is_admin'])
            {
                case 0:
                    redirect('/Welcome', 'refresh');
                break;
                case 1:
                    redirect('/Welcome', 'refresh');
                break;
                case 2:
                    $this->load->view("login.php",$data);
                break;
                case 3:
                    redirect('/Welcome', 'refresh');
                break;
                default:
                    $this->load->view("login.php",$data);
                exit(1); // EXIT_ERROR
            }    
        $this->load->view("footer.php",$data);

}

function login_user(){
               $data= array();
           $data=$this->Site_settings_model->admin_check($data);
           $data=$this->Site_settings_model->parameters_compile($data,'COPY');

  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>md5($this->input->post('user_password'))

    );

    $usr=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
    
      if($usr)
      {
        $this->session->set_userdata('user_id',$usr['user_id']);
        $this->session->set_userdata('user_email',$usr['user_email']);
        $this->session->set_userdata('user_name',$usr['user_name']);
        $this->session->set_userdata('user_age',$usr['user_age']);
        $this->session->set_userdata('user_mobile',$usr['user_mobile']);

                    redirect('/Welcome', 'refresh');

      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');

           $this->load->view("header.php",$data);
           $this->load->view("login.php");
           $this->load->view("footer.php",$data);        

      }


}

public function user_logout(){

  $this->session->sess_destroy();
  redirect('user', 'refresh');
}

}

?>
