<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

  	public function __construct()
	{
	    parent::__construct();
	    // $this->output->enable_profiler();

	    //  if not signed in kick them out
	    if($this->session->userdata('signed_in') == NULL)
	    {
	    	redirect('/');
	    }
	    
	}

	public function index()
	{
	   	$userInfo = $this->User->get_by_id($this->session->userdata('signed_in'));

	   	$friends = $this->Friend->get_by_id($this->session->userdata('signed_in'));

	   	$notFriends = $this->Friend->get_others_by_id($this->session->userdata('signed_in'));

	   	$passIt = array("userInfo"=>$userInfo, "friends"=>$friends, "notFriends"=>$notFriends);

	   	$this->load->view('friends/index', $passIt);
	}

  	public function add($id = NULL)
  	{
  		if($id == NULL)
  		{
  			redirect('/');
  		}
  		else
  		{
  			$user = array("user_id"=>$this->session->userdata('signed_in'),"friend_id"=>$id);
  			$reciprocate =array("user_id"=>$id, "friend_id"=>$this->session->userdata('signed_in'));
  			if($this->Friend->add($user))
  		{
	  		if($this->Friend->add($reciprocate))
	  			{
	  				redirect('/friends');
	  			}
	  		else
	  			{
	  				die('db reciprocal friend write failed');
	  			}
	  	}	
  		else
	  		{
	  			die('db friend write failed');
	  		}
  		}
  	}
  	public function users($id = NULL)
  	{
  		if($id == NULL)
  		{
  			redirect('/');
  		}
  		else
  		{
  			$userInfo = $this->User->get_by_id($id);

  			$passIt = array("userInfo"=>$userInfo);

  			$this->load->view('users/index', $passIt);
  		}
  	}

  	public function remove($id = NULL)
  	{
  		if($id == NULL)
  		{
  			redirect('/');
  		}
  		else
  		{
  			$user = array("user_id"=>$this->session->userdata('signed_in'), "friend_id"=>$id);
  			$reciprocate = array("user_id"=>$id, "friend_id"=>$this->session->userdata('signed_in'));
  			if($this->Friend->remove($user))
  			{
  				if($this->Friend->remove($reciprocate))
  				{
  					redirect('/friends');
  				}
  				else
  				{
  					die('db reciprocal friend removal failed');
  				}
  			}
  			else
  			{
  				die('db friend removal failed');

  			}
  		}

  	}	

}





