<?php
//this is person model
class Barangay
{
    var $brgy_id;
    var $barangay;
    var $zip_code;
	var $municipality;
	var $date_added;

    function __construct()
    {
        $this->brgy_id = 658113;
        $this->barangay = "Dhan";
        $this->zip_code = "Alamo";
		$this->municipality = "legazpi";
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
    function setbarangay($barangay)
    {    
		$this->barangay = $barangay;
	}
	function getbarangay()
    {
     return $this->barangay;   
	}
    function setzip_code($zip_code)
    {
        $this->zip_code = $zip_code;
    }
    //getter or accessor
    function getzip_code()
    {
       return $this->zip_code; 
    }
	function setmucipality($municipality)
    {
        $this->municipality = $municipality;
    }
    //getter or accessor
    function getmunicipality()
    {
       return $this->municipality; 
    }
}