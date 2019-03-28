<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $this->load->model('User');
    $postData['AllPostdata'] = $this->User->getPostData();
    $postData['SearchCategory'] = $this->User->GetSearchCategory();
    //print_r($postData);
    $this->load->view('front',$postData);
  }

  function login()
  {
    $this->load->view('login');
  }
  function register()
  {
    $viewpageArray['name'] = "Registration Page";
    $this->load->view('register');
  }

  function otpVerification()
  {
    $name = $arrayOtpDetails['name'] = $this->input->post('name');
    $email = $arrayOtpDetails['email'] = $this->input->post('email');
    $number = $arrayOtpDetails['number'] = $this->input->post('number');
    $this->load->model('ngoModel');
    $arrayOtpDetails['otp_number'] = $this->ngoModel->send_otp($name,$number);
    $this->load->view('ngo/Otp',$arrayOtpDetails);
  }

  function verifyotp()
  {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $number = $this->input->post('number');
    $generatedotp = $this->input->post('generatedotp');
    $userotp = $this->input->post('userotp');
    if($generatedotp == $userotp)
    {
      $this->load->model('ngoModel');
      $getUserid['user_id'] = $this->ngoModel->saveUserData($name,$email,$number);

      $this->load->view('ngo/website',$getUserid);
    }
    else
    {
      redirect('Landing/register');
    }
   
  }

  function YesSaveNGOResgistration()
  {
    $url = $this->input->post('url');
    $user_id = $this->input->post('user_id');
    $name = $this->input->post('name');
    $type = $this->input->post('type');
    $description = $this->input->post('description');
    $location = $this->input->post('Location');
    $strength = $this->input->post('strength');
    $username = $this->input->post('Username');
    $password = $this->input->post('Password');
    $this->load->model('ngoModel');
    $this->ngoModel->RegisterNGO($user_id,$url,$name,$type,$description,$location,$strength,$username,$password);
  }

  function SelectTemplate($user_id)
  {
    $userDetail['user_id'] = $user_id;
    $this->load->view('ngo/WebsiteNo',$userDetail);
  }

  function WebsiteNoDetails()
  {
    $finalDetails['template'] = $this->input->post('template');
    $finalDetails['user_id'] = $this->input->post('user_id');
    $this->load->view('ngo/WebsiteNoDetails',$finalDetails);
  }

  function previewTemplate()
  {
    $sendDetailsInTemplate['user_id'] = $this->input->post('user_id');
    $template = $sendDetailsInTemplate['template'] = $this->input->post('template');
    $sendDetailsInTemplate['name'] = $this->input->post('name');
    $sendDetailsInTemplate['type'] = $this->input->post('type');
    $sendDetailsInTemplate['description'] = $this->input->post('description');
    $sendDetailsInTemplate['location'] = $this->input->post('Location');
    $sendDetailsInTemplate['strength'] = $this->input->post('strength');
    $sendDetailsInTemplate['username'] = $this->input->post('Username');
    $sendDetailsInTemplate['password'] = $this->input->post('Password');
    if($template == 1)
    {
      $this->load->view('ngo/Templates/Template1',$sendDetailsInTemplate);
    }
    elseif($template == 2)
    {
      $this->load->view('ngo/Templates/Template2',$sendDetailsInTemplate);
    }
    elseif ($template == 3) {
      $this->load->view('ngo/Templates/Template3',$sendDetailsInTemplate);
    }

  }

  function previewTemplate_save()
  {
    $user_id = $this->input->post('user_id');
    $template = $this->input->post('template');
    $name = $this->input->post('name');
    $type = $this->input->post('type');
    $description = $this->input->post('description');
    $location = $this->input->post('Location');
    $strength = $this->input->post('strength');
    $username = $this->input->post('Username');
    $password = $this->input->post('Password');
   // $this->load->model('')
  }


// -------------------------- DONATION SEARCH START ----------------------------

  function action_page()
  {
    $cat = $viewCategoryItem['cat'] = $this->input->post('category');
    $this->load->model('User');
    $viewCategoryItem['CategoryItem'] = $this->User->getCategoryItems($cat);
    $this->load->view('Donation',$viewCategoryItem);
  }

  function listNGOs()
  {
     $getNGODonationList['items'] = $items = $this->input->post('items');
    $this->load->model('User');
    $getNGODonationList['NGONoDonationDetails'] = $this->User->getNGONoDonationList($items);
    $getNGODonationList['NGODonationDetails'] = $this->User->getNGODonationList($items);
    $this->load->view('listNGOs',$getNGODonationList);
  }

  function about()
  {
    $this->load->view('AboutUs');
  }

  function makedonation()
  {
    $itemid = $this->input->post('itemid');
    $ngo_id = $this->input->post('ngo_id');
    $quantity = $this->input->post('quantity');
    $donor = $this->input->post('donor');
    $number = $this->input->post('number');
    $email = $this->input->post('email');
    $day = $this->input->post('day');
    $time = $this->input->post('time');
    $this->load->model('User');
    $this->User->saveDonationDetails($quantity,$donor,$number,$email,$day,$time,$itemid,$ngo_id);
    $this->User->send_notification($donor,$number);
   // redirect('Landing','refresh');
  }
}
