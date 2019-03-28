<?php
Class User extends CI_Model
{

  function getPostData()
  {
    $arrayDetailsPost = array(); $i=0;
    $this->db->select('post_title,post_description,post_image_name,post.timestamp,name');
    $this->db->from('post');
    $this->db->join('user','user.user_id = post.user_id');
    $this->db->order_by('timestamp','DESC');
    $result = $this->db->get();
    foreach ($result->result() as $res) {
      $arrayDetailsPost[$i]['name'] = $res->name;
      $arrayDetailsPost[$i]['post_title'] = $res->post_title;
      $arrayDetailsPost[$i]['post_description'] = $res->post_description;
      $arrayDetailsPost[$i]['post_image_name'] = $res->post_image_name;
      $arrayDetailsPost[$i]['timestamp'] = $res->timestamp;
      $i++;
    }
    
    return $arrayDetailsPost;
  }

 function checkLogin($username, $password)
 {
   //Get the login details
   $this->db->select('*');
   $this->db->from('login');
   $this->db->join('user','user.user_id=login.user_id');
   $this->db->where('username', $username);
   $this->db->where('password', MD5($password));

   $query = $this->db->get();
   //print_r($query);
   if($query->num_rows() == 1) // count number of rows fetched by the query
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function LoginToEvent($username,$password)
  {
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['user_id'];
    $this->db->select('*');
    $this->db->from('login');
    $this->db->join('user','user.user_id=login.user_id');
    $this->db->where('username',$username);
    $this->db->where('password',$password);

    $query = $this->db->get();
    if($query->num_rows() == 1) // count number of rows fetched by the query
     {
       return $query->result();
     }
     else
     {
       return false;
     }

  }

 function register($email, $ph_no)
 {
   //Get the login details
   $this -> db -> select('priv,email,ph_no,club_id,uid');
   $this -> db -> from('users');
   $this -> db -> where('email', $email);
   $this -> db -> where('ph_no', $ph_no);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function clubMemberDetail($username,$password,$confirmpassword,$uid){

    $insertArray =array(
    'username'=> $username ,
    'priv'=>"9",
    'password'=>Md5($password),
    'uid'=>$uid,

    );
      $this->db->insert('login',$insertArray);

 }

 function user_details($uid)
 {
   //Get the user details
   $this->db->select('login_id,login.user_main_info_id,name,number,email,profile_pic,login.company_id');
   $this->db->where('login.user_main_info_id', $uid);
   $this->db->from('user_main_info');
   $this->db->join('login','login.user_main_info_id=user_main_info.user_main_info_id');

    $getUserDetail = $this->db->get();

    $userDetail = array();
    $ctr = 0;
    foreach($getUserDetail->result() as $row)
    {
      $userDetail[$ctr]['user_main_info_id'] = $row->user_main_info_id;
      $userDetail[$ctr]['name'] = $row->name;
      $userDetail[$ctr]['number'] = $row->number;
      $userDetail[$ctr]['email'] = $row->email;
      $userDetail[$ctr]['profile_pic'] = $row->profile_pic;
      $userDetail[$ctr]['company_id'] = $row->company_id;
      $ctr++;
    }

    return $userDetail ;

 }

 function GetSearchCategory()
 {
  $GetSearchCategory = array();$ctr=0;
  $this->db->select('category_name,category_id');
  $this->db->from('category');
  $result = $this->db->get();
  foreach($result->result() as $row)
    {
      $GetSearchCategory[$ctr]['category_name'] = $row->category_name;
      $GetSearchCategory[$ctr]['category_id'] = $row->category_id;
      $ctr++;
    }
    return $GetSearchCategory ;
 }

 function getCategoryItems($category)
 {
  $getCategoryItems = array();$ctr=0;
  $this->db->select('donate_item_id,item_name,time_interval,item_category_id');
  $this->db->from('donate');
  $this->db->where('item_category_id',$category);
  $result = $this->db->get();
  foreach($result->result() as $row)
    {
      $getCategoryItems[$ctr]['donate_item_id'] = $row->donate_item_id;
      $getCategoryItems[$ctr]['item_name'] = $row->item_name;
      $getCategoryItems[$ctr]['time_interval'] = $row->time_interval;
      $getCategoryItems[$ctr]['item_category_id'] = $row->item_category_id;
      $ctr++;
    }
    return $getCategoryItems ;
 }

 function getNGONoDonationList($itemId)
 {
    $getNGONoDonationListDetails = array();$i=0;$ii=0;
    $this->db->select('ngo.ngo_id,ngo_name,ngo_description,strength,location');
    $this->db->from('ngo');
    $this->db->join('ngo_detail','ngo_detail.ngo_id = ngo.ngo_id');
    $result = $this->db->get();
    foreach ($result->result() as $resu) {
      $ngo_id = $resu->ngo_id;

      $this->db->select('COUNT(category_item_id) as cate');
      $this->db->from('donated_items');
      $this->db->where('category_item_id',$itemId);
      $this->db->where('ngo_id',$ngo_id);
      $resultQuery = $this->db->get();
      $value = $resultQuery->result();
      if($value[0]->cate == 0)
      {
        foreach ($resultQuery->result() as $res) {
          $getNGONoDonationListDetails[$i]['ngo_id'] = $resu->ngo_id; 
         $getNGONoDonationListDetails[$i]['ngo_name'] = $resu->ngo_name;
          $getNGONoDonationListDetails[$i]['ngo_description'] = $resu->ngo_description;
          $getNGONoDonationListDetails[$i]['strength'] = $resu->strength;
          $getNGONoDonationListDetails[$i]['location'] = $resu->location;
          $ii++;
      } 

      }
      
      $i++;
    }
    return $getNGONoDonationListDetails;
 }

 function getNGODonationList($itemId)
 {
    $getNGODonationListDetails = array();$i=0;$ii=0;
    $this->db->select('ngo.ngo_id,ngo_name,ngo_description,strength,location');
    $this->db->from('ngo');
    $this->db->join('ngo_detail','ngo_detail.ngo_id = ngo.ngo_id');
    $result = $this->db->get();
    foreach ($result->result() as $resu) {
      $ngo_id = $resu->ngo_id;
      $strength = $resu->strength;

      $this->db->select('COUNT(category_item_id) as category_item_id');
      $this->db->from('donated_items');
      $this->db->where('category_item_id',$itemId);
      $this->db->where('ngo_id',$ngo_id);
      
      $resultQuery = $this->db->get();
      $value = $resultQuery->result();
      if($value[0]->category_item_id > 0)
      {
        foreach ($resultQuery->result() as $res) {
          $getNGODonationListDetails[$i]['ngo_id'] = $resu->ngo_id;
          $getNGODonationListDetails[$i]['ngo_name'] = $resu->ngo_name;
          $getNGODonationListDetails[$i]['ngo_description'] = $resu->ngo_description;
          $getNGODonationListDetails[$i]['strength'] = $resu->strength;
          $getNGODonationListDetails[$i]['location'] = $resu->location;
          $ii++;
      } 

      }
      
      $i++;
    }
    return $getNGODonationListDetails;
 }

 function makedonation()
 {
  $itemid = $this->input->post('itemid');
  $quantity = $this->input->post('quantity');
  $this->load->modal('User');
  $this->User->makedonation('$itemid,$quantity');
 }

 function saveDonationDetails($quantity,$donor,$number,$email,$day,$time,$itemid,$ngo_id)
 {
   $insertDonationArray = array(
    'category_item_id' => $itemid,
    'ngo_id' => $ngo_id,
    'quantity' => $quantity,
    'donor' => $donor,
    'number' => $number,
    'email' => $email,
    'day' => $day,
    'time' => $time
   );
   
   $this->db->insert('donated_items',$insertDonationArray);
   
 }

 function send_notification($name,$number)
    {
      $name = str_replace(' ','%20', $name);
      $bin_no ="Hello%20$name,You%20has%20been%20Successfully%20Registered";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://45.249.108.134/api.php?username=propfloor&password=ankit11011&sender=PFLOOR&sendto=$number&message=$bin_no");
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $content = curl_exec($ch);
      //print_r($content);
      curl_close($ch);
    }

}
?>
