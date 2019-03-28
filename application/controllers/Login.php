<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
 }


 function google(){
  $this->laod->view('google2322e5eb9d32c08f.html');
 }

function tempo()
{
  $this->session->unset_userdata('logged_in');
}
function index()
 {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
   $this->load->model('User');
   $result = $this->User->checkLogin($username,$password);
   if($result)
   {

    $priv=10;
     $sess_array = array();
     foreach($result as $row)
     {
      $this->session->unset_userdata('logged_in');
      $sess_array = array(
         'uid' => $row->user_id,
         'name' => $row->name,
         'username' => $row->username,
         'priv' => $priv,
         'cid' => $row->cid
       );

      $this->session->set_userdata('logged_in', $sess_array);
      $session_data = $this->session->userdata('logged_in');
    //  print_r($session_data);
     }
       redirect('Home', 'refresh');
   }
   else
   {
    redirect('Home','refresh');
   }
 }


 function checkLogin()
 {
   $username = $this->input->post('username');
   $password = $this->input->post('password');
   $this->load->model('User');
   $result = $this->User->checkLogin($username,$password);
   //($result);
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'user_id' => $row->user_id,
         'username' => $row->username,
         'name'=> $row->name,
         'priv' => $row->priv
       );

       $this->session->set_userdata('logged_in', $sess_array);
      $session_data = $this->session->userdata('logged_in');
     // print_r($session_data);
     }
     redirect('Home', 'refresh');
   }
   else
   {
    // redirect('Home','refresh');
   }
 }
 function registerForm()
 {
   $this->load->helper(array('form'));
   $this->load->view('header/header_register.php');
   $this->load->view('registerView.php');
 }

 function register()
 {

 }

  function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('Home', 'refresh');
 }

 function forgetPassword()
 {
  $this->load->view('header/header_login');
  $this->load->view('forgetPassword.php');
 }

 function phoneVerification()
 {
  $this->load->view('header/header_login');
  $this->load->view('verify_otp');
 }

   //method to verify the club member details for registrations

}

?>
