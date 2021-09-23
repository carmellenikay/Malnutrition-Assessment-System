<?php
//this is person model
class Account
{
    var $account_id;
    var $username;
    var $password;
    var $access_level;
	var $status;
	var $date_added;
	var $fullname;
	var $user_id;
	var $res_id;

    function __construct()
    {
        $this->account_id = 658113;
        $this->username = "Dhan";
        $this->password = "Alamo";
        $this->access_level = "";
		$this->status = "active";
		$this->fullname = "my";
		$this->user_id = 12;
		$this->res_id = 12;
		
    }

    //setter or mutator
    function setaccount_id($account_id)
    {
        $this->account_id = $account_id;
    }
    //getter or accessor
    function getaccount_id()
    {
       return $this->account_id; 
    }
    function setfullname($fullname)
    {    
		$this->fullname = $fullname;
	}
	function getfullname()
    {
     return $this->fullname;   
	}
	
	function setuser_id($userid)
    {    
		$this->userid = $userid;
	}
	function getuser_id()
    {
     return $this->userid;   
	}
	
	function setres_id($resid)
    {    
		$this->resid = $resid;
	}
	function getres_id()
    {
     return $this->resid;   
	}
    function setusername($username)
    {    
		$this->username = $username;
	}
	function getusername()
    {
     return $this->username;   
	}
    function setpassword($password)
    {
        $this->password = $password;
    }
    //getter or accessor
    function getpassword()
    {
       return $this->password; 
    }
	
	
	function setaccess_level($access_level)
    {
        $this->access_level = $access_level;
    }
    //getter or accessor
    function getaccess_level()
    {
       return $this->access_level;
	}
	
	function setstatus($status)
    {
        $this->status = $status;
    }
    //getter or accessor
    function getstatus()
    {
       return $this->status;
	}
}