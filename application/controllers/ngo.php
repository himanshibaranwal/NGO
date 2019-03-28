<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ngo extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

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
    $session_data = $this->session->userdata('logged_in');
   // print_r($session_data);
    $dashboard['name'] = $session_data['name'];
    $dashboard['email'] = $session_data['username'];
    $uid = $dashboard['uid'] = $session_data['user_id'];
    $this->load->model('ngoModel');
    $dashboard['DonationDetails'] = $this->ngoModel->getDonationDetail($uid);
    $dashboard['PostCount'] = $this->ngoModel->getPost($uid);
    $dashboard['DonationCount'] = $this->ngoModel->getDonation($uid);
    $dashboard['StrengthCount'] = $this->ngoModel->getStrength($uid);

    $this->load->view('ngo/landingPage',$dashboard);
  }

  function dashboard()
  {

  }

  function viewNGO()
  {
    $session_data = $this->session->userdata('logged_in');
    $getResult['name'] = $session_data['name'];
    $getResult['email'] = $session_data['username'];

    $this->load->model('ngoModel');
    $getResult['viewNGODetail'] =  $this->ngoModel->viewNGO();
   // print_r($getResult);
    $this->load->view('ngo/viewNGO',$getResult);
  }

  function addNGO()
  {
    $session_data = $this->session->userdata('logged_in');
    $ngoType['name'] = $session_data['name'];
    $ngoType['email'] = $session_data['username'];

    $this->load->model('ngoModel');
    $ngoType['getNGOtype'] = $this->ngoModel->getNGOType();
    $this->load->view('ngo/addNgo',$ngoType);
  }

  function savePostDetails()
  {
      $ngo_name = $this->input->post('ngo_name');
      $ngo_location = $this->input->post('ngo_location');
      $ngo_description = $this->input->post('ngo_description');
      $ngo_type = $this->input->post('ngo_type');
      $this->load->model('ngoModel');
      $this->ngoModel->saveNGODetails($ngo_name,$ngo_location,$ngo_description,$ngo_type);
  }

  function addPost()
  {
    $session_data = $this->session->userdata('logged_in');
    $addpostArray['name'] = $session_data['name'];
    $addpostArray['email'] = $session_data['username'];

    $this->load->view('ngo/addMyPost',$addpostArray);

  }

   function do_upload()
        {
          $post_title = $this->input->post('post_title');
          $post_description = $this->input->post('post_description');

                $config['upload_path']          = './vendor/img/';
                $config['allowed_types']        = 'gif|jpg|png';
               // print_r($config);
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        //print_r($data);
                        $this->load->model('ngoModel');
                        $this->ngoModel->savePost($post_title,$post_description,$data);
                }

                redirect('landing');
        }

  /* function abcd(){
    $session_data = $this->session->userdata('logged_in');
    //print_r($session_data);
    $registration1['name'] = $session_data['name'];
    $registration1['email'] = $session_data['username'];

    $this->load->view('ngo/registration1',$registration1);
  } */
}
