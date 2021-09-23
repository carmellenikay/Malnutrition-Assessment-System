<?php
//this is person model
class Damage_report	
{
    var $damage_id;
    var $evac_id;
    var $estimated_cost;
    var $brgy_id;
	var	$res_id;
	var $brgy;
	var $calamity_date;
	var $calamity;
	var $tpname;
	

    function __construct()
    {
        $this->damage_id = 658113;
        $this->damage_type = "Dhan";
        $this->estimated_cost = "Alamo";
        $this->brgy_id = 23;
		$this->res_id = 651692;
		$this->calamity_date ="2019-02-03";
		$this->calamity ="Typhoon"; 
		$this->brgy ="legazpi";
		$this->tpname ="Amang";		
    }

    //setter or mutator
    function setdamage_id($damage_id)
    {
        $this->damage_id = $damage_id;
    }
    //getter or accessor
    function getdamage_id()
    {
       return $this->damage_id; 
    }

    function setdamage_type($damage_type)
    {
        $this->damage_type = $damage_type;
    }
    function getdamage_type()
    {
        return $this->damage_type;
    }
    function setestimated_cost($estimated_cost)
    {
        $this->estimated_cost = $estimated_cost;
    }
    //getter or accessor
    function getestimated_cost()
    {
       return $this->estimated_cost; 
    }
	function setbrgy_id($brgy_id)
    {
        $this->brgy_id = $brgy_id;
    }
    //getter or accessor
    function getbrgy_id()
    {
       return $this->brgy_id; 
	}
	function setres_id($res_id)
    {
        $this->res_id = $res_id;
    }
    //getter or accessor
    function getres_id()
    {
       return $this->res_id; 
	}
	function setcalamity_date($calamity_date)
    {
        $this->calamity_date = $calamity_date;
    }
    function getcalamity_date()
    {
       return $this->calamity_date; 
	}
	function setcalamity($calamity)
    {
        $this->calamity = $calamity;
    }
    function getcalamity()
    {
       return $this->calamity; 
	}
	function setbrgy($brgy)
    {
        $this->brgy = $brgy;
    }
    function getbrgy()
    {
       return $this->brgy; 
	}

	function settpname($tpname)
    {
        $this->tpname = $tpname;
    }
    function gettpname()
    {
       return $this->tpname; 
	}
	
	
	}	
?>