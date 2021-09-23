<?php
//this is person model
class Evaluation_criteria
{
    var $evac_id;
    var $damage_type;
    var $description;
    var $date_added;

    function __construct()
    {
        $this-evac_id = 658113;
        $this->damage_type = "Dhan";
        $this->description = "Alamo";
        $this->date_added = 23;
    }

    //setter or mutator
    function setevac_id($evac_id)
    
        $this->ap_id = $evac_id;
    }
    //getter or accessor
    function getevac_id()
    {
       return $this->evac_id; 
    }

    function setdescription($description)
    {
        
		$this->description = $description;
    
	}
    
	function getdescription()
    
	{
    
    return $this->description;   
	}
    function setdate_added($date_added)
    {
        $this->date_added = $date_added;
    }
    //getter or accessor
    function getdate_added()
    {
       return $this->date_added; 
    }
	}