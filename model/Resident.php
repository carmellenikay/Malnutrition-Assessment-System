<?php
//this is person model
class Resident	
{
    var $res_id;
    var $fullname;
    var $address;
    var $brgy_id;
	var	$date_added;

    function __construct()
    {
        $this->res_id = 658113;
        $this->fullname = "Dhan";
        $this->address = "Alamo";
        $this->brgy_id = 23;
    }

    //setter or mutator
    function setres_id($id)
	{ 
        $this->res_id = $id;
    }
    //getter or accessor
    function getres_id()
    {
       return $this->res_id; 
    }

    function setfullname($fullname)
    {
        $this->fullname = $fullname;
    }
    function getfullname()
    {
        return $this->fullname;
    }

    function setaddress($address)
    {

        $this->address = $address;
    }
    //getter or accessor
    function getaddress()
    {
       return $this->address; 
    }

    function setbrgy_id($brgy_id)
    {
        $this->brgy_id = $brgy_id;
    }

    function getbrgy_id()
    {
        return $this->brgy_id;
    }


}

?>