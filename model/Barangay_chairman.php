<?php
//this is person model
class Barangay_Chairman
{
    var $brgy_id;
    var $position;
    var $cname;
	var $user_id;
	var $res_id;

    function __construct()
    {
        $this->brgy_id = 658113;
        $this->position = "Dhan";
        $this->cname = "Alamo";
		$this->user_id = 23;
		$this->res_id = 23;
    }

    //setter or mutator
    function setbrgy_id($brgy_id)
    {
        $this->brgy_id = $brgy_id;
    }
    //getter or accessor
    function getbrgy_id()
    {
       return $this->brgy_id; 
    }
    function setposition($position)
    {    
		$this->position = $position;
	}
	function getposition()
    {
     return $this->position;   
	}
    function setcname($cname)
    {
        $this->cname = $cname;
    }
    //getter or accessor
    function getcname()
    {
       return $this->cname; 
    }
	function setuser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    //getter or accessor
    function getuser_id()
    {
       return $this->user_id; 
    }
	//res_id
	function setres_id($res_id)
    {
        $this->res_id = $res_id;
    }
    //getter or accessor
    function getres_id()
    {
       return $this->res_id; 
    }
}