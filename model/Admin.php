<?php
//this is person model
class Admin
{
    var $admin_id;
    var $username;
    var $password;

    function __construct()
    {
        $this->admin_id = 658113;
        $this->username = "Dhan";
        $this->password = "Alamo";
    }

    //setter or mutator
    function setadmin_id($admin_id)
    
        $this->admin_id = $admin_id;
    }
    //getter or accessor
    function getadmin_id()
    {
       return $this->admin_id; 
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
	}