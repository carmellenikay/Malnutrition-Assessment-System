<?php
//this is the touristController
session_start();
error_reporting(E_ALL & ~E_NOTICE);

class EvaluationCriteriaController

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    	// register Barangay	
	function addevaluation_criteria($eva)
		{
			$sql = "INSERT into evaluation_criteria(fullname, position, birthdate, date_added)
				VALUES('".$eva->getdamage_type()."','".$eva->getdescription()."','".$eva->getdate_added()."')'";
				$this->con->query($sql);
				
				echo "<script>alert('Tourist Account Was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=tourist.php'>";
				//$this->con->close();	
		}
	function Showevaluation_criteria()
		{
			$sql = "SELECT * FROM evaluation_criteria";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damage_type'][$ctr] = $row['damage_type'];
					$data['description'][$ctr] = $row['description'];
					$data['date_added'] [$ctr] = $row['date_added'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		// show specific tourist info
		
	function updateResident($res)
    {
		//$a_id=$tour -> getAid();
        $sqlUpd = "UPDATE tourist SET  t_name='" . $tour->gettName() . "', t_bday ='" . $tour->gettBday() . "'
        ,  t_contact_no = '" . $tour->gettcontactNo() . "',  t_email = '" . $tour->gettEmail() . "',  t_address = '" . $tour->gettAddress() . "' WHERE tourist_id ='" .$tour -> gettouristId(). "' ";
        
		$this->con->query($sqlUpd);
		
		echo "<script>alert('Tourist Record Was Successfully Updated')</script>";
		echo "<meta http-equiv='refresh'content='0;url=Uaccounts.php'>";
        //$this->con->close();
    }
	function deleteREsident($res)
    {
       
        $sqlUpd = "DELETE FROM tourist WHERE tourist_id = $tourist_id";
        $this->conn->query($sqlUpd);
        $this->conn->close();
    }
	
}

?>