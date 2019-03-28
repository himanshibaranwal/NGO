<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
   $session_data = $this->session->userdata('logged_in');
//   echo "asza"; print_r($session_data);
    $priv = $data['priv'] = $session_data['priv'];

   if($priv == 1){//admin
    redirect('ngo/index','refresh');
   }

   elseif($priv == 2){//treasurer
     redirect('TLEmployee','refresh');
   }

   elseif($priv == 3){//user(President/Secretary))
    //Call the model user and then the function to get the details of the user
     redirect('Manager/index','refresh');
   }
   elseif($priv == 4){//user(President/Secretary))
    //Call the model user and then the function to get the details of the user
     redirect('TEmployee/index','refresh');
   }
   elseif($priv == 5){//user(President/Secretary))
    //Call the model user and then the function to get the details of the user
     redirect('Employee/index','refresh');
   }
   elseif($priv == 7){
    redirect('President','refresh');
   }

    elseif($priv == 8){
     redirect('Secretary','refresh');
   }

    elseif($priv == 9){
     redirect('ClubMember','refresh');
   }
   elseif($priv == 10)
   {
    redirect('Event/index','refresh');
   }
 }
   else
   {
     //If no session, redirect to login page
     redirect('Landing', 'refresh');
   }
}

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('Home', 'refresh');
 }


}

?>
