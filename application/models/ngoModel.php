<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class ngoModel extends CI_Model
  {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function viewNGO()
    {
      $session_data = $this->session->userdata('logged_in');
      $user_id = $session_data['user_id'];

      $arrayGetNGODetail = array();$i=0;
      $this->db->select('*');
      $this->db->from('ngo');
      $this->db->join('ngo_type','ngo_type.ngo_type_id = ngo.ngo_type_id');
      $this->db->join('ngo_detail','ngo_detail.ngo_id = ngo.ngo_id');
      $this->db->where('ngo.user_id',$user_id);
      $getQuery = $this->db->get();

      foreach($getQuery->result() as $row) {
        $arrayGetNGODetail[$i]['ngo_name'] = $row->ngo_name;
        $arrayGetNGODetail[$i]['ngo_type_name'] = $row->ngo_type_name;
        $arrayGetNGODetail[$i]['ngo_description'] = $row->ngo_description;
        $arrayGetNGODetail[$i]['location'] = $row->location;
        $arrayGetNGODetail[$i]['strength'] = $row->strength;
        $i++;
      }

      return $arrayGetNGODetail;
    }

    function getNGOType()
    {
      $NGOType = array();
      $i=0;
      $this->db->select('*');
      $this->db->from('ngo_type');
      $getNGOTypeResult = $this->db->get();

      foreach ($getNGOTypeResult->result() as $row) {
        $NGOType[$i]['ngo_type_id'] = $row->ngo_type_id;
        $NGOType[$i]['ngo_type_name'] = $row->ngo_type_name;
        $i++;
      }
      return $NGOType;
    }

    function saveNGODetails($ngo_name,$ngo_location,$ngo_description,$ngo_type)
    {
      $session_data = $this->session->userdata('logged_in');
      $user_id = $session_data['user_id'];

      $arrayInsertData = array(
        'ngo_name' => $ngo_name,
        'ngo_type_id' => $ngo_type,
        'user_id' => $user_id
      );
      $this->db->insert('ngo',$arrayInsertData);

      //$this->
    }

    function savePost($post_title,$post_description,$data)
    {
      $session_data = $this->session->userdata('logged_in');
      $user_id = $session_data['user_id'];

      $file_name = $data['upload_data']['file_name'];
      $insertPostArray = array(
        'post_title' => $post_title,
        'post_description' => $post_description,
        'post_image_name' => $file_name,
        'user_id' => $user_id
      );
      $this->db->insert('post',$insertPostArray);
    }

    function saveUserData($name,$email,$number)
    {
      $userdata = array(
        'name' => $name,
        'email' => $email,
        'number' => $number

      );
      $this->db->insert('user',$userdata);
      $this->db->select('user_id');
      $this->db->from('user');
      $this->db->order_by('user_id','desc');
      $this->db->limit(1);
      $result=$this->db->get();
      $user_id=$result->result();
      $user_id=$user_id[0]->user_id;
      //print_r($user_id);
      return $user_id;
    }

    function send_otp($name,$number)
    {
      $name = str_replace(' ','%20', $name);
      $otp_number = rand(1000,9999);
      $bin_no ="Hello%20$name,%20Your%20OTP%20is%20$otp_number.";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://45.249.108.134/api.php?username=propfloor&password=ankit11011&sender=PFLOOR&sendto=$number&message=$bin_no");
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $content = curl_exec($ch);
      //print_r($content);
      curl_close($ch);
      return $otp_number;
    }

    function RegisterNGO($user_id,$url,$name,$type,$description,$location,$strength,$username,$password)
    {
      $arrayRegister = array(
          'ngo_name' => $name,
          'ngo_type_id' => $type,
          'user_id' => $user_id
      );
      $this->db->insert('ngo',$arrayRegister);

      $this->db->select('ngog_id');
      $this->db->from('ngo');
      $this->db->order_by('ngi_id','desc');
      $this->db->limit(1);
      $result=$this->db->get();
      $ngo_id=$result->result();
      $ngo_id=$ngo_id[0]->ngo_id;
      //print_r($user_id);
      $arrayRegister_details = array(
          'ngo_id' => $ngo_id,
          'ngo_description' => $description,
          'location' => $location,
          'strength' => $strength,
          'username'
      );
      $this->db->insert('ngo_detail',$arrayRegister_details);

      $password = md5($password);
      $arrayRegister_login = array(
          'username' => $username,
          'password' => $password,
          'priv' => '1',
          'user_id' => $user_id
      );
      $this->db->insert('login',$arrayRegister_login);
    }

    function getDonationDetail($uid)
    {
      $resultDonationArray = array();$i=0;
      $this->db->select('ngo_id');
      $this->db->from('ngo');
      $this->db->where('user_id',$uid);
      $result = $this->db->get();
      foreach ($result->result() as $res) {
        $ngo_id = $resultDonationArray[$i]['ngo_id'] = $res->ngo_id;
        $this->db->select('quantity,ngo_id,donor,number,email,day,time,item_name');
        $this->db->from('donated_items');
        $this->db->join('donate','donate.donate_item_id = donated_items.category_item_id');
        $this->db->where('donated_items.ngo_id',$ngo_id);
        $this->db->order_by('donated_items.timestamp','DESC');
        $resu = $this->db->get();
        foreach ($resu->result() as $re) {
          $resultDonationArray[$i]['quantity'] = $re->quantity;
          $resultDonationArray[$i]['ngo_id'] = $re->ngo_id;
          $resultDonationArray[$i]['donor'] = $re->donor;
          $resultDonationArray[$i]['number'] = $re->number;
          $resultDonationArray[$i]['email'] = $re->email;
          $resultDonationArray[$i]['day'] = $re->day;
          $resultDonationArray[$i]['time'] = $re->time;
          $resultDonationArray[$i]['item_name'] = $re->item_name;
          $i++;
        }
      }
      return $resultDonationArray;
    }

    function getPost($uid)
    {
      $this->db->select('COUNT(post_id) as totalPost');
      $this->db->from('post');
      $this->db->where('user_id',$uid);
      $result = $this->db->get();
      $countPost = $result->result();
      $countPost = $countPost[0]->totalPost;
      return $countPost;
    }

    function getDonation($uid)
    {
      $this->db->select('COUNT(last_donated_id) as totalDonation');
      $this->db->from('donated_items');
      $this->db->join('ngo','ngo.ngo_id = donated_items.ngo_id');
      $this->db->where('ngo.user_id',$uid);
      $result = $this->db->get();
      $countDonation = $result->result();
      $countDonation = $countDonation[0]->totalDonation;
      return $countDonation;
    }

    function getStrength($uid)
    {
      $this->db->select('strength');
      $this->db->from('ngo_detail');
      $this->db->join('ngo','ngo.ngo_id = ngo_detail.ngo_id');
      $this->db->where('ngo.user_id',$uid);
      $result = $this->db->get();
      $countStrength = $result->result();
      $countStrength = $countStrength[0]->strength;
      return $countStrength;
    }

  }

  ?>