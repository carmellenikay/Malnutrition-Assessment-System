<?php
//this is person model
class Typhoon
{
    var $typhoon_id;
    var $t_name;
    var $t_year;


    function __construct()
    {
        $this->typhoon_id = 658113;
        $this->t_name = "Dhan";
        $this->t_year = "2019";
        
		
    }

    //setter or mutator
    function settyphoonid($typhoonid)
    {
        $this->typhoonid = $typhoonid;
    }
    //getter or accessor
    function gettyphoonid()
    {
       return $this->typhoonid; 
    }
	
	function settname($tname)
    {
        $this->tname = $tname;
    }
    //getter or accessor
    function gettname()
    {
       return $this->tname; 
    }
	function settyear($tyear)
    {
        $this->tyear = $tyear;
    }
    //getter or accessor
    function gettyear()
    {
       return $this->tyear; 
    }
}