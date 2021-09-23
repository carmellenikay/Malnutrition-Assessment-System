<?php
//this is person model
class Apsemo
{
    var $ap_id;
    var $fullname;
    var $position;
    var $birthdate;
	var	$date_added;
	var $user_id;

    function __construct()
    {
        $this->ap_id = 658113;
        $this->fullname = "Dhan";
        $this->position = "Alamo";
        $this->birthdate = 23;
		$this->date_added = 651692;
		 
    }

    //setter or mutator
    function setap_id($ap_id)
    {
        $this->ap_id = $ap_id;
    }
    //getter or accessor
    function getap_id()
    {
       return $this->ap_id; 
    }

    function setfullname($fullname)
    {
        $this->fullname = $fullname;
    }
    function getfullname()
    {
        return $this->fullname;
    }
    function setposition($position)
    {
        $this->position = $position;
    }
    //getter or accessor
    function getposition()
    {
       return $this->position; 
    }
	function setbirthdate($birthdate)
    {
        $this->birthdate= $birthdate;
    }
    //getter or accessor
    function getbirthdate()
    {
       return $this->birthdate; 
	}
	function setdate_added($date_added)
    {
        $this->date_added = $date_added;
    }
    function getdate_added()
    {
       return $this->date_added;
	}	   
	function setuser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    function getuser_id()
    {
       return $this->user_id; 
	}
}
?>